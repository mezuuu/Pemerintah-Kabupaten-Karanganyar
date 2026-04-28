<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuLink;
use Illuminate\Http\Request;

class MenuLinkController extends Controller
{
    /**
     * Display all menu links grouped by category.
     */
    public function index()
    {
        $menuLinks = MenuLink::orderBy('group')->orderBy('order')->get()->groupBy('group');
        $groups = ['Profil', 'Perangkat Daerah', 'Aduan', 'Data'];
        return view('admin.menu-links.index', compact('menuLinks', 'groups'));
    }

    /**
     * Store a new menu link.
     */
    public function store(Request $request)
    {
        $request->validate([
            'group' => 'required|string|max:100',
            'label' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        // Auto-set order to last position in the group
        $maxOrder = MenuLink::where('group', $request->group)->max('order') ?? 0;

        MenuLink::create([
            'group' => $request->group,
            'label' => $request->label,
            'url' => $request->url,
            'is_external' => $request->has('is_external'),
            'order' => $maxOrder + 1,
        ]);

        return redirect()->route('admin.menu-links.index')->with('success', "Link \"{$request->label}\" berhasil ditambahkan ke grup {$request->group}!");
    }

    /**
     * Update an existing menu link.
     */
    public function update(Request $request, MenuLink $menuLink)
    {
        $request->validate([
            'group' => 'required|string|max:100',
            'label' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        $menuLink->update([
            'group' => $request->group,
            'label' => $request->label,
            'url' => $request->url,
            'is_external' => $request->has('is_external'),
        ]);

        return redirect()->route('admin.menu-links.index')->with('success', "Link \"{$request->label}\" berhasil diperbarui!");
    }

    /**
     * Delete a menu link.
     */
    public function destroy(MenuLink $menuLink)
    {
        $label = $menuLink->label;
        $menuLink->delete();
        return redirect()->route('admin.menu-links.index')->with('success', "Link \"{$label}\" berhasil dihapus!");
    }
}
