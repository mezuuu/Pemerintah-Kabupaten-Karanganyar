@extends('layouts.app')

@section('title', 'Beranda - Portal Resmi Pemerintah Kabupaten Karanganyar')

@section('content')

    {{-- ===== HERO SECTION ===== --}}
    <section class="hero-section">
        <div class="container position-relative" style="z-index:2;">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1>Selamat Datang di<br>Kabupaten Karanganyar</h1>
                    <p class="hero-tagline">
                        Karanganyar Tentrem — terbentang indah di lereng Gunung Lawu. Dari kekayaan alam yang memukau hingga
                        warisan budaya yang adiluhung, Karanganyar menyambut Anda.
                    </p>
                    <a href="{{ url('/layanan-publik') }}" class="btn btn-hero">
                        <i class="bi bi-arrow-right-circle me-2"></i>Layanan Publik
                    </a>
                </div>
            </div>

            {{-- Stats Bar --}}
            <div class="stats-bar">
                <div class="row text-center">
                    <div class="col-6 col-md-3">
                        <div class="stat-item">
                            <div class="stat-number">900 Rb+</div>
                            <div class="stat-label">Penduduk</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-item">
                            <div class="stat-number">17</div>
                            <div class="stat-label">Kecamatan</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-item">
                            <div class="stat-number">177</div>
                            <div class="stat-label">Desa / Kelurahan</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-item">
                            <div class="stat-number">20+</div>
                            <div class="stat-label">Layanan Online</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== QUICK ACCESS / LAYANAN PUBLIK ===== --}}
    <section class="quick-access">
        <div class="container">
            <div class="section-title">
                <h2>Akses Cepat Layanan</h2>
                <p>Akses layanan pemerintahan Kabupaten Karanganyar dengan mudah dan cepat</p>
                <div class="title-line"></div>
            </div>
            <div class="row g-4">
                <div class="col-6 col-md-4 col-lg-2">
                    <a href="{{ url('/layanan-publik') }}" class="text-decoration-none">
                        <div class="quick-access-card">
                            <div class="qa-icon"><i class="bi bi-headset"></i></div>
                            <h6>Layanan Publik</h6>
                            <p>Daftar layanan perangkat daerah</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <a href="https://ppid.karanganyarkab.go.id/" target="_blank" class="text-decoration-none">
                        <div class="quick-access-card">
                            <div class="qa-icon"><i class="bi bi-info-circle"></i></div>
                            <h6>PPID</h6>
                            <p>Informasi publik daerah</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <a href="{{ url('/wbs') }}" class="text-decoration-none">
                        <div class="quick-access-card">
                            <div class="qa-icon"><i class="bi bi-shield-exclamation"></i></div>
                            <h6>WBS</h6>
                            <p>Whistleblowing System</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <a href="{{ url('/suara-masyarakat') }}" class="text-decoration-none">
                        <div class="quick-access-card">
                            <div class="qa-icon"><i class="bi bi-megaphone"></i></div>
                            <h6>Suara Rakyat</h6>
                            <p>Aduan masyarakat</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <a href="{{ url('/transparansi-anggaran') }}" class="text-decoration-none">
                        <div class="quick-access-card">
                            <div class="qa-icon"><i class="bi bi-cash-stack"></i></div>
                            <h6>Keuangan</h6>
                            <p>Transparansi anggaran</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <a href="{{ url('/statistik') }}" class="text-decoration-none">
                        <div class="quick-access-card">
                            <div class="qa-icon"><i class="bi bi-bar-chart-line"></i></div>
                            <h6>Statistik</h6>
                            <p>Data statistik daerah</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== PERANGKAT DAERAH ===== --}}
    <section class="organisasi-section">
        <div class="container">
            <div class="section-title">
                <h2>Perangkat Daerah</h2>
                <p>Struktur organisasi Pemerintah Kabupaten Karanganyar</p>
                <div class="title-line"></div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="org-card">
                        <div class="org-icon"><i class="bi bi-building"></i></div>
                        <h5>Sekretariat Daerah</h5>
                        <p>Pusat administrasi dan koordinasi pemerintahan daerah Kabupaten Karanganyar.</p>
                        <a href="{{ url('/organisasi/sekretariat-daerah') }}" class="org-link">Selengkapnya <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="org-card">
                        <div class="org-icon"><i class="bi bi-bank"></i></div>
                        <h5>Sekretariat DPRD</h5>
                        <p>Mendukung kelancaran tugas dan fungsi Dewan Perwakilan Rakyat Daerah.</p>
                        <a href="{{ url('/organisasi/sekretariat-dprd') }}" class="org-link">Selengkapnya <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="org-card">
                        <div class="org-icon"><i class="bi bi-search"></i></div>
                        <h5>Inspektorat</h5>
                        <p>Lembaga pengawas internal pemerintah daerah untuk menjamin akuntabilitas.</p>
                        <a href="{{ url('/organisasi/inspektorat') }}" class="org-link">Selengkapnya <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="org-card">
                        <div class="org-icon"><i class="bi bi-diagram-3"></i></div>
                        <h5>Badan Daerah</h5>
                        <p>Lembaga teknis daerah yang menangani fungsi penunjang urusan pemerintahan.</p>
                        <a href="{{ url('/organisasi/badan') }}" class="org-link">Selengkapnya <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="org-card">
                        <div class="org-icon"><i class="bi bi-gear"></i></div>
                        <h5>Dinas Daerah</h5>
                        <p>Unsur pelaksana otonomi daerah yang menangani urusan pemerintahan tertentu.</p>
                        <a href="{{ url('/organisasi/dinas') }}" class="org-link">Selengkapnya <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="org-card">
                        <div class="org-icon"><i class="bi bi-geo-alt"></i></div>
                        <h5>Kecamatan</h5>
                        <p>Wilayah kerja camat sebagai perangkat daerah kabupaten.</p>
                        <a href="{{ url('/organisasi/kecamatan') }}" class="org-link">Selengkapnya <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="org-card">
                        <div class="org-icon"><i class="bi bi-house-door"></i></div>
                        <h5>Kelurahan</h5>
                        <p>Wilayah kerja lurah sebagai perangkat kecamatan di Kabupaten Karanganyar.</p>
                        <a href="{{ url('/organisasi/kelurahan') }}" class="org-link">Selengkapnya <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="org-card">
                        <div class="org-icon"><i class="bi bi-hospital"></i></div>
                        <h5>Rumah Sakit Umum Daerah</h5>
                        <p>Penyedia layanan kesehatan bagi masyarakat Kabupaten Karanganyar.</p>
                        <a href="{{ url('/organisasi/rsud') }}" class="org-link">Selengkapnya <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="org-card">
                        <div class="org-icon"><i class="bi bi-briefcase"></i></div>
                        <h5>BUMD</h5>
                        <p>Badan Usaha Milik Daerah yang menunjang perekonomian daerah.</p>
                        <a href="{{ url('/organisasi/bumd') }}" class="org-link">Selengkapnya <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== POTENSI DAERAH ===== --}}
    <section class="potensi-section">
        <div class="container">
            <div class="section-title">
                <h2>Potensi Daerah</h2>
                <p>Temukan informasi tentang wisata, data, keuangan, dan budaya Karanganyar</p>
                <div class="title-line"></div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <a href="https://pesonakaranganyar.karanganyarkab.go.id/" target="_blank" class="text-decoration-none">
                        <div class="potensi-card">
                            <div class="potensi-bg"
                                style="background-image: url('https://widyalokawisata.com/wp-content/uploads/2024/04/Air-Terjun-Grojogan-Sewu-scaled.webp');">
                            </div>
                            <div class="potensi-overlay"></div>
                            <div class="potensi-content">
                                <h4><i class="bi bi-tree me-2"></i>Pariwisata</h4>
                                <p>Pesona alam Grojogan Sewu</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="{{ url('/transparansi-anggaran') }}" class="text-decoration-none">
                        <div class="potensi-card">
                            <div class="potensi-bg"
                                style="background-image: url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=600&q=80');">
                            </div>
                            <div class="potensi-overlay"></div>
                            <div class="potensi-content">
                                <h4><i class="bi bi-cash-coin me-2"></i>Keuangan Daerah</h4>
                                <p>Transparansi anggaran & belanja</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="https://satudata.karanganyarkab.go.id/" target="_blank" class="text-decoration-none">
                        <div class="potensi-card">
                            <div class="potensi-bg"
                                style="background-image: url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&q=80');">
                            </div>
                            <div class="potensi-overlay"></div>
                            <div class="potensi-content">
                                <h4><i class="bi bi-graph-up me-2"></i>Data & Statistik</h4>
                                <p>Akses data terbuka daerah</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="{{ url('/hibah-dan-bansos') }}" class="text-decoration-none">
                        <div class="potensi-card">
                            <div class="potensi-bg"
                                style="background-image: url('https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=600&q=80');">
                            </div>
                            <div class="potensi-overlay"></div>
                            <div class="potensi-content">
                                <h4><i class="bi bi-people me-2"></i>Hibah & Bansos</h4>
                                <p>Bantuan sosial masyarakat</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== ADUAN MASYARAKAT ===== --}}
    <section class="aduan-section">
        <div class="container">
            <div class="section-title">
                <h2 class="text-white">Saluran Aduan Masyarakat</h2>
                <p class="text-white-50">Sampaikan aspirasi, pengaduan, atau laporan Anda melalui kanal resmi berikut</p>
                <div class="title-line"></div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-6 col-md-4 col-lg">
                    <a href="{{ url('/wbs') }}" class="text-decoration-none text-white">
                        <div class="aduan-card">
                            <i class="bi bi-shield-lock"></i>
                            <h6>Whistleblowing System</h6>
                            <p>Laporkan pelanggaran secara aman</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg">
                    <a href="{{ url('/suara-masyarakat') }}" class="text-decoration-none text-white">
                        <div class="aduan-card">
                            <i class="bi bi-chat-left-text"></i>
                            <h6>Suara Masyarakat</h6>
                            <p>Aspirasi & masukan warga</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg">
                    <a href="https://laporgub.jatengprov.go.id/" target="_blank" class="text-decoration-none text-white">
                        <div class="aduan-card">
                            <i class="bi bi-flag"></i>
                            <h6>Laporgub</h6>
                            <p>Laporan ke Gubernur Jateng</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg">
                    <a href="https://www.lapor.go.id/" target="_blank" class="text-decoration-none text-white">
                        <div class="aduan-card">
                            <i class="bi bi-send"></i>
                            <h6>SP4N Lapor</h6>
                            <p>Layanan aspirasi nasional</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg">
                    <a href="https://api.whatsapp.com/send?phone=628112629999" target="_blank"
                        class="text-decoration-none text-white">
                        <div class="aduan-card">
                            <i class="bi bi-whatsapp"></i>
                            <h6>Sapamas</h6>
                            <p>Aduan via WhatsApp</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== BERITA TERKINI ===== --}}
    <section class="berita-section">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div class="section-title text-start mb-0">
                    <h2>Berita Terkini</h2>
                    <p>Informasi dan berita terbaru dari Kabupaten Karanganyar</p>
                    <div class="title-line" style="margin:12px 0 0;"></div>
                </div>
                <a href="{{ url('/berita') }}" class="btn btn-outline-custom d-none d-md-inline-flex">
                    Lihat Semua <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="berita-card">
                        <div class="berita-img">
                            <img src="https://images.unsplash.com/photo-1577962917302-cd874c4e31d2?w=600&q=80"
                                alt="Berita 1">
                        </div>
                        <div class="berita-body">
                            <div class="berita-meta">
                                <span class="berita-category">Pemerintahan</span>
                                <span class="berita-date"><i class="bi bi-calendar3 me-1"></i> 25 April 2026</span>
                            </div>
                            <h5>Bupati Karanganyar Resmikan Gedung Pelayanan Terpadu Satu Pintu</h5>
                            <p>Pemerintah Kabupaten Karanganyar terus meningkatkan kualitas pelayanan publik dengan
                                meresmikan gedung baru yang modern dan terintegrasi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="berita-card">
                        <div class="berita-img">
                            <img src="https://images.unsplash.com/photo-1517457373958-b7bdd4587205?w=600&q=80"
                                alt="Berita 2">
                        </div>
                        <div class="berita-body">
                            <div class="berita-meta">
                                <span class="berita-category">Pembangunan</span>
                                <span class="berita-date"><i class="bi bi-calendar3 me-1"></i> 22 April 2026</span>
                            </div>
                            <h5>Pembangunan Infrastruktur Jalan di Kecamatan Tawangmangu Selesai Tepat Waktu</h5>
                            <p>Proyek perbaikan jalan sepanjang 5 km di kawasan wisata Tawangmangu telah rampung dan siap
                                digunakan oleh masyarakat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="berita-card">
                        <div class="berita-img">
                            <img src="https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?w=600&q=80"
                                alt="Berita 3">
                        </div>
                        <div class="berita-body">
                            <div class="berita-meta">
                                <span class="berita-category">Sosial</span>
                                <span class="berita-date"><i class="bi bi-calendar3 me-1"></i> 20 April 2026</span>
                            </div>
                            <h5>Program Bantuan Sosial Tahap II Disalurkan ke 15 Kecamatan</h5>
                            <p>Pemerintah Kabupaten Karanganyar menyalurkan bantuan sosial tahap kedua yang menyasar ribuan
                                keluarga penerima manfaat.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4 d-md-none">
                <a href="{{ url('/berita') }}" class="btn btn-outline-custom">Lihat Semua Berita <i
                        class="bi bi-arrow-right ms-2"></i></a>
            </div>
        </div>
    </section>

@endsection