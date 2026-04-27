@extends('layouts.app')

@section('title', 'Berita - Pemerintah Kabupaten Karanganyar')

@section('content')

{{-- Page Header --}}
<section style="background:linear-gradient(135deg, var(--navy) 0%, var(--royal-blue) 100%);color:#fff;padding:60px 0 40px;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2" style="--bs-breadcrumb-divider-color:rgba(255,255,255,0.5);">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.7);">Beranda</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Berita</li>
            </ol>
        </nav>
        <h1 style="font-weight:800;font-size:2rem;">Berita Kabupaten Karanganyar</h1>
    </div>
</section>

<section>
    <div class="container">
        <div class="row g-4">
            {{-- Berita Items --}}
            @php
            $beritaList = [
                [
                    'title' => 'Bupati Karanganyar Resmikan Gedung Pelayanan Terpadu Satu Pintu',
                    'cat' => 'Pemerintahan',
                    'date' => '25 April 2026',
                    'desc' => 'Pemerintah Kabupaten Karanganyar terus meningkatkan kualitas pelayanan publik dengan meresmikan gedung baru yang modern dan terintegrasi.',
                    'img' => 'https://images.unsplash.com/photo-1577962917302-cd874c4e31d2?w=600&q=80'
                ],
                [
                    'title' => 'Pembangunan Infrastruktur Jalan di Kecamatan Tawangmangu Selesai Tepat Waktu',
                    'cat' => 'Pembangunan',
                    'date' => '22 April 2026',
                    'desc' => 'Proyek perbaikan jalan sepanjang 5 km di kawasan wisata Tawangmangu telah rampung dan siap digunakan oleh masyarakat.',
                    'img' => 'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?w=600&q=80'
                ],
                [
                    'title' => 'Program Bantuan Sosial Tahap II Disalurkan ke 15 Kecamatan',
                    'cat' => 'Sosial',
                    'date' => '20 April 2026',
                    'desc' => 'Pemerintah Kabupaten Karanganyar menyalurkan bantuan sosial tahap kedua yang menyasar ribuan keluarga penerima manfaat.',
                    'img' => 'https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?w=600&q=80'
                ],
                [
                    'title' => 'Festival Budaya Karanganyar 2026 Sukses Digelar',
                    'cat' => 'Budaya',
                    'date' => '18 April 2026',
                    'desc' => 'Festival tahunan ini berhasil menarik ribuan pengunjung dari berbagai daerah dan menampilkan kekayaan budaya Karanganyar.',
                    'img' => 'https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=600&q=80'
                ],
                [
                    'title' => 'Pelatihan UMKM Digital untuk Pelaku Usaha di Karanganyar',
                    'cat' => 'Ekonomi',
                    'date' => '15 April 2026',
                    'desc' => 'Dinas Koperasi dan UMKM menyelenggarakan pelatihan digitalisasi bagi ratusan pelaku usaha mikro di Kabupaten Karanganyar.',
                    'img' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=600&q=80'
                ],
                [
                    'title' => 'Wisata Tawangmangu Catat Rekor Pengunjung di Musim Libur',
                    'cat' => 'Pariwisata',
                    'date' => '12 April 2026',
                    'desc' => 'Kawasan wisata Tawangmangu mencatat lonjakan pengunjung signifikan selama periode libur panjang bulan ini.',
                    'img' => 'https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?w=600&q=80'
                ],
            ];
            @endphp

            @foreach ($beritaList as $berita)
            <div class="col-md-6 col-lg-4">
                <div class="berita-card">
                    <div class="berita-img">
                        <img src="{{ $berita['img'] }}" alt="{{ $berita['title'] }}">
                    </div>
                    <div class="berita-body">
                        <div class="berita-meta">
                            <span class="berita-category">{{ $berita['cat'] }}</span>
                            <span class="berita-date"><i class="bi bi-calendar3 me-1"></i> {{ $berita['date'] }}</span>
                        </div>
                        <h5>{{ $berita['title'] }}</h5>
                        <p>{{ $berita['desc'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
