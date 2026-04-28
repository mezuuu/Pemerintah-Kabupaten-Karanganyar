<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Show admin dashboard.
     */
    public function index()
    {
        $totalNews = News::count();
        $totalUsers = User::count();
        $pendingUsers = User::where('is_approved', false)->count();
        $recentNews = News::with('creator')->latest()->take(5)->get();

        return view('admin.dashboard', compact('totalNews', 'totalUsers', 'pendingUsers', 'recentNews'));
    }
}
