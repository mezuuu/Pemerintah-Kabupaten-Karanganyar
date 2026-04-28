@extends('admin.layouts.app')

@section('title', 'Kelola Berita')
@section('page-title', 'Kelola Berita')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <p class="text-muted mb-0">Kelola semua artikel berita yang tampil di halaman beranda</p>
        <a href="{{ route('admin.news.create') }}" class="btn btn-accent">
            <i class="bi bi-plus-lg me-1"></i> Tambah Berita
        </a>
    </div>

    <div class="admin-table">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width:80px">Gambar</th>
                        <th>Headline</th>
                        <th>Kategori</th>
                        <th>Link</th>
                        <th>Tanggal</th>
                        <th style="width:140px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($news as $item)
                        <tr>
                            <td>
                                @if($item->og_image)
                                    <img src="{{ $item->og_image }}" alt="" style="width:70px; height:45px; object-fit:cover; border-radius:6px;">
                                @else
                                    <div style="width:70px; height:45px; background:#f0f0f0; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                        <i class="bi bi-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-semibold">{{ Str::limit($item->headline, 60) }}</div>
                                <div class="text-muted" style="font-size:0.8rem">{{ Str::limit($item->description, 80) }}</div>
                            </td>
                            <td><span class="badge bg-secondary">{{ $item->category }}</span></td>
                            <td>
                                <a href="{{ $item->link }}" target="_blank" class="text-decoration-none" style="font-size:0.82rem">
                                    <i class="bi bi-link-45deg"></i> Buka
                                </a>
                            </td>
                            <td class="text-muted" style="font-size:0.85rem">{{ $item->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $item) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                Belum ada berita yang ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($news->hasPages())
            <div class="p-3 border-top">
                {{ $news->links() }}
            </div>
        @endif
    </div>
@endsection
