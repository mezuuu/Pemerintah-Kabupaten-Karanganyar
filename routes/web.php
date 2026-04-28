<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MenuLinkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ===================================================================
// PUBLIC ROUTES (auto-logout admin jika mengunjungi halaman publik)
// ===================================================================
Route::middleware('logout.public')->group(function () {
    // === Beranda ===
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // === Profil ===
    Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
    Route::get('/legislatif', fn() => view('frontend.pages.placeholder', ['title' => 'Legislatif']))->name('legislatif');
    Route::get('/pejabat', fn() => view('frontend.pages.placeholder', ['title' => 'Daftar Pejabat']))->name('pejabat');
    Route::get('/rlppd', fn() => view('frontend.pages.placeholder', ['title' => 'RLPPD Kabupaten Karanganyar']))->name('rlppd');

    // === Perangkat Daerah ===
    Route::get('/organisasi/{slug}', fn($slug) => view('frontend.pages.placeholder', [
        'title' => 'Perangkat Daerah - ' . ucwords(str_replace('-', ' ', $slug))
    ]))->name('organisasi');

    // === Berita ===
    Route::get('/berita', [HomeController::class, 'berita'])->name('berita');

    // === Layanan Publik ===
    Route::get('/layanan-publik', [HomeController::class, 'layananPublik'])->name('layanan-publik');

    // === Aduan Masyarakat ===
    Route::get('/wbs', fn() => view('frontend.pages.placeholder', ['title' => 'Whistleblowing System']))->name('wbs');
    Route::get('/suara-masyarakat', fn() => view('frontend.pages.placeholder', ['title' => 'Suara Masyarakat']))->name('suara-masyarakat');

    // === Data & Transparansi ===
    Route::get('/transparansi-anggaran', fn() => view('frontend.pages.placeholder', ['title' => 'Transparansi Anggaran']))->name('transparansi-anggaran');
    Route::get('/hibah-dan-bansos', fn() => view('frontend.pages.placeholder', ['title' => 'Hibah dan Bantuan Sosial']))->name('hibah-bansos');
    Route::get('/statistik', fn() => view('frontend.pages.placeholder', ['title' => 'Statistik Daerah']))->name('statistik');
});

// ===================================================================
// ADMIN ROUTES
// ===================================================================

// --- Auth ---
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::post('/admin/register', [LoginController::class, 'register'])->name('admin.register');

// --- Protected Admin Routes ---
Route::prefix('admin')->middleware(['auth', 'admin.approved', \App\Http\Middleware\NoCacheHeaders::class])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // News Management
    Route::get('/news', [NewsController::class, 'index'])->name('admin.news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/news/{news}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('admin.news.destroy');

    // User Management
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::put('/users/{user}/approve', [UserController::class, 'approve'])->name('admin.users.approve');
    Route::put('/users/{user}/reject', [UserController::class, 'reject'])->name('admin.users.reject');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // Menu Link Management
    Route::get('/menu-links', [MenuLinkController::class, 'index'])->name('admin.menu-links.index');
    Route::post('/menu-links', [MenuLinkController::class, 'store'])->name('admin.menu-links.store');
    Route::put('/menu-links/{menuLink}', [MenuLinkController::class, 'update'])->name('admin.menu-links.update');
    Route::delete('/menu-links/{menuLink}', [MenuLinkController::class, 'destroy'])->name('admin.menu-links.destroy');
});
