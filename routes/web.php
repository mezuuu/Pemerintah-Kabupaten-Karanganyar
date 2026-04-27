<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// === Beranda ===
Route::get('/', [HomeController::class, 'index'])->name('home');

// === Profil ===
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/legislatif', fn() => view('pages.placeholder', ['title' => 'Legislatif']))->name('legislatif');
Route::get('/pejabat', fn() => view('pages.placeholder', ['title' => 'Daftar Pejabat']))->name('pejabat');
Route::get('/rlppd', fn() => view('pages.placeholder', ['title' => 'RLPPD Kabupaten Karanganyar']))->name('rlppd');

// === Perangkat Daerah ===
Route::get('/organisasi/{slug}', fn($slug) => view('pages.placeholder', [
    'title' => 'Perangkat Daerah - ' . ucwords(str_replace('-', ' ', $slug))
]))->name('organisasi');

// === Berita ===
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');

// === Layanan Publik ===
Route::get('/layanan-publik', [HomeController::class, 'layananPublik'])->name('layanan-publik');

// === Aduan Masyarakat ===
Route::get('/wbs', fn() => view('pages.placeholder', ['title' => 'Whistleblowing System']))->name('wbs');
Route::get('/suara-masyarakat', fn() => view('pages.placeholder', ['title' => 'Suara Masyarakat']))->name('suara-masyarakat');

// === Data & Transparansi ===
Route::get('/transparansi-anggaran', fn() => view('pages.placeholder', ['title' => 'Transparansi Anggaran']))->name('transparansi-anggaran');
Route::get('/hibah-dan-bansos', fn() => view('pages.placeholder', ['title' => 'Hibah dan Bantuan Sosial']))->name('hibah-bansos');
Route::get('/statistik', fn() => view('pages.placeholder', ['title' => 'Statistik Daerah']))->name('statistik');
