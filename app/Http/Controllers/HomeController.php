<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda portal Kabupaten Karanganyar.
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Halaman Profil Kabupaten.
     */
    public function profil()
    {
        return view('pages.profil');
    }

    /**
     * Halaman Berita.
     */
    public function berita()
    {
        return view('pages.berita');
    }

    /**
     * Halaman Layanan Publik.
     */
    public function layananPublik()
    {
        return view('pages.layanan-publik');
    }
}
