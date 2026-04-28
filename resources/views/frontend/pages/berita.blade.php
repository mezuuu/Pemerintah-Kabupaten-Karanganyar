@extends('frontend.layouts.app')

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
            @forelse($news as $item)
                <div class="col-md-6 col-lg-4">
                    <a href="{{ $item->link }}" target="_blank" class="text-decoration-none">
                        <div class="berita-card">
                            <div class="berita-img">
                                @if($item->display_image)
                                    <img src="{{ $item->display_image }}" alt="{{ $item->headline }}">
                                @else
                                    <img src="https://images.unsplash.com/photo-1504711434969-e33886168d6c?w=600&q=80" alt="{{ $item->headline }}">
                                @endif
                            </div>
                            <div class="berita-body">
                                <div class="berita-meta">
                                    <span class="berita-category">{{ $item->category }}</span>
                                    <span class="berita-date"><i class="bi bi-calendar3 me-1"></i> {{ $item->created_at->format('d M Y') }}</span>
                                </div>
                                <h5>{{ $item->headline }}</h5>
                                <p>{{ Str::limit($item->description, 120) }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-newspaper" style="font-size:3rem; color: rgba(0,0,0,0.15);"></i>
                    <p class="text-muted mt-2">Belum ada berita yang dipublikasikan.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($news->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $news->links() }}
            </div>
        @endif
    </div>
</section>

@endsection
