<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda portal Kabupaten Karanganyar.
     */
    public function index()
    {
        $news = News::latest()->take(3)->get();
        return view('frontend.home', compact('news'));
    }

    /**
     * Halaman Profil Kabupaten.
     */
    public function profil()
    {
        return view('frontend.pages.profil');
    }

    /**
     * Halaman Berita.
     */
    public function berita()
    {
        $news = News::latest()->paginate(9);
        return view('frontend.pages.berita', compact('news'));
    }

    /**
     * Halaman Layanan Publik.
     */
    public function layananPublik()
    {
        return view('frontend.pages.layanan-publik');
    }
}
