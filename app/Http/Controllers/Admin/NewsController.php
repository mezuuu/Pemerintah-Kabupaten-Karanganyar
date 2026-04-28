<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display all news.
     */
    public function index()
    {
        $news = News::with('creator')->latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a new news article.
     */
    public function store(Request $request)
    {
        $request->validate([
            'headline' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'link' => 'required|url',
            'category' => 'required|string|max:50',
            'manual_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Handle manual image upload
        $manualImageName = null;
        if ($request->hasFile('manual_image')) {
            $file = $request->file('manual_image');
            $manualImageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/news'), $manualImageName);
        }

        // Fetch OG image from the URL (as fallback)
        $ogImage = $this->fetchOgImage($request->link);

        News::create([
            'headline' => $request->headline,
            'description' => $request->description,
            'link' => $request->link,
            'og_image' => $ogImage,
            'manual_image' => $manualImageName,
            'category' => $request->category,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Show edit form.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update an existing news article.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'headline' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'link' => 'required|url',
            'category' => 'required|string|max:50',
            'manual_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'headline' => $request->headline,
            'description' => $request->description,
            'link' => $request->link,
            'category' => $request->category,
        ];

        // Handle manual image upload
        if ($request->hasFile('manual_image')) {
            // Delete old manual image if exists
            if ($news->manual_image) {
                $oldPath = public_path('images/news/' . $news->manual_image);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $file = $request->file('manual_image');
            $manualImageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/news'), $manualImageName);
            $data['manual_image'] = $manualImageName;
        }

        // Handle remove manual image checkbox
        if ($request->has('remove_manual_image') && !$request->hasFile('manual_image')) {
            if ($news->manual_image) {
                $oldPath = public_path('images/news/' . $news->manual_image);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $data['manual_image'] = null;
        }

        // Re-fetch OG image if the link has changed
        if ($news->link !== $request->link) {
            $data['og_image'] = $this->fetchOgImage($request->link);
        }

        // Allow manual refresh of OG image
        if ($request->has('refresh_image')) {
            $data['og_image'] = $this->fetchOgImage($request->link);
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Delete a news article.
     */
    public function destroy(News $news)
    {
        // Delete manual image file if exists
        if ($news->manual_image) {
            $path = public_path('images/news/' . $news->manual_image);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus!');
    }

    /**
     * Fetch OG image from a URL by parsing the page's meta tags.
     */
    private function fetchOgImage(string $url): ?string
    {
        try {
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_MAXREDIRS => 5,
                CURLOPT_TIMEOUT => 15,
                CURLOPT_CONNECTTIMEOUT => 10,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                CURLOPT_HTTPHEADER => [
                    'Accept: text/html,application/xhtml+xml',
                    'Accept-Language: id-ID,id;q=0.9,en;q=0.8',
                ],
            ]);

            $html = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($html === false || $httpCode >= 400) {
                return null;
            }

            // Try og:image (property before content)
            if (preg_match('/<meta[^>]+property\s*=\s*["\']og:image["\'][^>]+content\s*=\s*["\']([^"\']+)["\']/i', $html, $matches)) {
                return $matches[1];
            }

            // Try og:image (content before property)
            if (preg_match('/<meta[^>]+content\s*=\s*["\']([^"\']+)["\'][^>]+property\s*=\s*["\']og:image["\']/i', $html, $matches)) {
                return $matches[1];
            }

            // Try twitter:image
            if (preg_match('/<meta[^>]+(?:name|property)\s*=\s*["\']twitter:image["\'][^>]+content\s*=\s*["\']([^"\']+)["\']/i', $html, $matches)) {
                return $matches[1];
            }

            // Try twitter:image (content first)
            if (preg_match('/<meta[^>]+content\s*=\s*["\']([^"\']+)["\'][^>]+(?:name|property)\s*=\s*["\']twitter:image["\']/i', $html, $matches)) {
                return $matches[1];
            }

            // Last resort: try to find any large image in the page
            if (preg_match('/<img[^>]+src\s*=\s*["\']([^"\']+\.(?:jpg|jpeg|png|webp))["\'][^>]*/i', $html, $matches)) {
                $imgSrc = $matches[1];
                // Make relative URLs absolute
                if (strpos($imgSrc, 'http') !== 0) {
                    $parsed = parse_url($url);
                    $imgSrc = $parsed['scheme'] . '://' . $parsed['host'] . '/' . ltrim($imgSrc, '/');
                }
                return $imgSrc;
            }

            return null;
        } catch (\Exception $e) {
            return null;
        }
    }
}
