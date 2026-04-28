@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    {{-- Stats Cards --}}
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon" style="background: #fee2e2; color: #dc2626;">
                    <i class="bi bi-newspaper"></i>
                </div>
                <div class="stat-value">{{ $totalNews }}</div>
                <div class="stat-label">Total Berita</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon" style="background: #dbeafe; color: #2563eb;">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div class="stat-value">{{ $totalUsers }}</div>
                <div class="stat-label">Total Pengguna</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon" style="background: #fef3c7; color: #d97706;">
                    <i class="bi bi-hourglass-split"></i>
                </div>
                <div class="stat-value">{{ $pendingUsers }}</div>
                <div class="stat-label">Menunggu Persetujuan</div>
            </div>
        </div>
    </div>

    {{-- Recent News --}}
    <div class="admin-table">
        <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
            <h6 class="mb-0 fw-bold">Berita Terbaru</h6>
            <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-accent">
                <i class="bi bi-plus-lg me-1"></i> Tambah Berita
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Headline</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Dibuat Oleh</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentNews as $item)
                        <tr>
                            <td>
                                @if($item->og_image)
                                    <img src="{{ $item->og_image }}" alt="" style="width:60px; height:40px; object-fit:cover; border-radius:6px;">
                                @else
                                    <div style="width:60px; height:40px; background:#f0f0f0; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                        <i class="bi bi-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <a href="{{ $item->link }}" target="_blank" class="text-decoration-none text-dark fw-semibold">
                                    {{ Str::limit($item->headline, 50) }}
                                </a>
                            </td>
                            <td><span class="badge bg-secondary">{{ $item->category }}</span></td>
                            <td class="text-muted">{{ $item->created_at->format('d M Y') }}</td>
                            <td class="text-muted">{{ $item->creator->name ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                Belum ada berita. <a href="{{ route('admin.news.create') }}">Tambah sekarang</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
