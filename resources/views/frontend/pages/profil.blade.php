@extends('frontend.layouts.app')

@section('title', 'Profil Kabupaten - Pemerintah Kabupaten Karanganyar')

@section('content')

{{-- Page Header --}}
<section style="background:linear-gradient(135deg, var(--navy) 0%, var(--royal-blue) 100%);color:#fff;padding:60px 0 40px;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2" style="--bs-breadcrumb-divider-color:rgba(255,255,255,0.5);">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.7);">Beranda</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Profil Kabupaten</li>
            </ol>
        </nav>
        <h1 style="font-weight:800;font-size:2rem;">Profil Kabupaten Karanganyar</h1>
    </div>
</section>

<section>
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <h2 style="color:var(--navy);font-weight:700;margin-bottom:20px;">Tentang Karanganyar</h2>
                <p style="line-height:1.9;color:var(--muted-text);">
                    Kabupaten Karanganyar merupakan salah satu kabupaten di Provinsi Jawa Tengah yang terletak di lereng barat Gunung Lawu. 
                    Dikenal dengan julukan <strong>"Bumi Intanpari"</strong> (Industri, Pertanian, dan Pariwisata), Karanganyar memiliki potensi alam, budaya, dan ekonomi yang sangat beragam.
                </p>
                <p style="line-height:1.9;color:var(--muted-text);">
                    Wilayah ini mencakup 17 kecamatan dengan luas wilayah sekitar 773,78 km² dan jumlah penduduk mencapai lebih dari 900 ribu jiwa. 
                    Kabupaten Karanganyar memiliki berbagai destinasi wisata alam yang terkenal seperti Tawangmangu, Candi Cetho, Candi Sukuh, serta berbagai air terjun yang memukau.
                </p>

                <div class="row g-3 mt-4">
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background:var(--light-gray);">
                            <small class="text-muted d-block mb-1">Ibu Kota</small>
                            <strong style="color:var(--navy);">Karanganyar</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background:var(--light-gray);">
                            <small class="text-muted d-block mb-1">Luas Wilayah</small>
                            <strong style="color:var(--navy);">773,78 km²</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background:var(--light-gray);">
                            <small class="text-muted d-block mb-1">Jumlah Kecamatan</small>
                            <strong style="color:var(--navy);">17 Kecamatan</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background:var(--light-gray);">
                            <small class="text-muted d-block mb-1">Jumlah Desa/Kelurahan</small>
                            <strong style="color:var(--navy);">162 Desa, 15 Kelurahan</strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 rounded-3" style="background:var(--light-gray);border:1px solid var(--border-color);">
                    <h5 style="color:var(--navy);font-weight:700;margin-bottom:16px;">Visi Kabupaten</h5>
                    <p style="font-size:0.9rem;line-height:1.8;color:var(--muted-text);">
                        Mewujudkan Karanganyar yang <strong>Maju, Berdaya Saing, dan Sejahtera</strong> melalui tata kelola pemerintahan yang baik, pelayanan publik yang prima, dan pembangunan berkelanjutan.
                    </p>
                    <hr>
                    <h5 style="color:var(--navy);font-weight:700;margin-bottom:16px;">Misi</h5>
                    <ol style="font-size:0.85rem;line-height:1.8;color:var(--muted-text);padding-left:18px;">
                        <li>Meningkatkan kualitas SDM yang beriman dan bertakwa</li>
                        <li>Meningkatkan perekonomian daerah berbasis potensi lokal</li>
                        <li>Membangun infrastruktur yang berkualitas dan merata</li>
                        <li>Mewujudkan tata kelola pemerintahan yang bersih dan transparan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
