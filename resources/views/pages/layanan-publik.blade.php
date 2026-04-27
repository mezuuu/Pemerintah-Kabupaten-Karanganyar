@extends('layouts.app')

@section('title', 'Layanan Publik - Pemerintah Kabupaten Karanganyar')

@section('content')

{{-- Page Header --}}
<section style="background:linear-gradient(135deg, var(--navy) 0%, var(--royal-blue) 100%);color:#fff;padding:60px 0 40px;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2" style="--bs-breadcrumb-divider-color:rgba(255,255,255,0.5);">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.7);">Beranda</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Layanan Publik</li>
            </ol>
        </nav>
        <h1 style="font-weight:800;font-size:2rem;">Daftar Layanan Publik</h1>
        <p class="mt-2 mb-0" style="opacity:0.8;">Layanan publik perangkat daerah Kabupaten Karanganyar</p>
    </div>
</section>

<section>
    <div class="container">
        <div class="row g-4">
            @php
            $layanan = [
                ['icon' => 'bi-person-vcard', 'name' => 'Kependudukan & Catatan Sipil', 'desc' => 'Layanan KTP, KK, akta kelahiran, dan dokumen kependudukan lainnya.'],
                ['icon' => 'bi-file-earmark-text', 'name' => 'Perizinan Terpadu', 'desc' => 'Pengurusan izin usaha, IMB, dan berbagai perizinan lainnya secara online.'],
                ['icon' => 'bi-heart-pulse', 'name' => 'Kesehatan', 'desc' => 'Informasi fasilitas kesehatan, puskesmas, dan program kesehatan masyarakat.'],
                ['icon' => 'bi-mortarboard', 'name' => 'Pendidikan', 'desc' => 'Layanan pendidikan, beasiswa, dan informasi sekolah di Kabupaten Karanganyar.'],
                ['icon' => 'bi-briefcase', 'name' => 'Ketenagakerjaan', 'desc' => 'Informasi lowongan kerja, pelatihan, dan program ketenagakerjaan daerah.'],
                ['icon' => 'bi-shop', 'name' => 'UMKM & Koperasi', 'desc' => 'Pendampingan usaha mikro kecil menengah dan pembinaan koperasi.'],
                ['icon' => 'bi-tree', 'name' => 'Lingkungan Hidup', 'desc' => 'Layanan terkait pengelolaan lingkungan, AMDAL, dan kebersihan.'],
                ['icon' => 'bi-truck', 'name' => 'Perhubungan', 'desc' => 'Informasi transportasi umum, pengujian kendaraan, dan lalu lintas.'],
                ['icon' => 'bi-shield-check', 'name' => 'Keamanan & Ketertiban', 'desc' => 'Layanan keamanan, perlindungan masyarakat, dan ketertiban umum.'],
                ['icon' => 'bi-house-door', 'name' => 'Perumahan & Pemukiman', 'desc' => 'Informasi program perumahan rakyat dan penataan kawasan pemukiman.'],
                ['icon' => 'bi-droplet', 'name' => 'Pekerjaan Umum', 'desc' => 'Layanan infrastruktur jalan, jembatan, irigasi, dan bangunan fasilitas umum.'],
                ['icon' => 'bi-people', 'name' => 'Sosial', 'desc' => 'Program bantuan sosial, rehabilitasi sosial, dan perlindungan masyarakat.'],
            ];
            @endphp

            @foreach ($layanan as $item)
            <div class="col-md-6 col-lg-4">
                <div class="org-card">
                    <div class="org-icon"><i class="bi {{ $item['icon'] }}"></i></div>
                    <h5>{{ $item['name'] }}</h5>
                    <p>{{ $item['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
