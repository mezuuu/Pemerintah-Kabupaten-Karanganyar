@extends('layouts.app')

@section('title', $title . ' - Pemerintah Kabupaten Karanganyar')

@section('content')

{{-- Page Header --}}
<section style="background:linear-gradient(135deg, var(--navy) 0%, var(--royal-blue) 100%);color:#fff;padding:60px 0 40px;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2" style="--bs-breadcrumb-divider-color:rgba(255,255,255,0.5);">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.7);">Beranda</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>
        <h1 style="font-weight:800;font-size:2rem;">{{ $title }}</h1>
    </div>
</section>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center py-5">
                    <div style="width:80px;height:80px;background:var(--light-gray);border-radius:20px;display:flex;align-items:center;justify-content:center;margin:0 auto 24px;color:var(--royal-blue);font-size:2rem;">
                        <i class="bi bi-gear-wide-connected"></i>
                    </div>
                    <h3 style="color:var(--navy);font-weight:700;">Halaman Sedang Dikembangkan</h3>
                    <p class="text-muted mb-4">Halaman <strong>{{ $title }}</strong> sedang dalam tahap pengembangan. Silakan kunjungi kembali nanti atau hubungi kami untuk informasi lebih lanjut.</p>
                    <a href="{{ url('/') }}" class="btn btn-primary-custom">
                        <i class="bi bi-house me-2"></i>Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
