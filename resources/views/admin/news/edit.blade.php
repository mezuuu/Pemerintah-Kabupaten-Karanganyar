@extends('admin.layouts.app')

@section('title', 'Edit Berita')
@section('page-title', 'Edit Berita')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="admin-table p-4">
                {{-- Current OG Image Preview --}}
                @if($news->og_image)
                    <div class="mb-4 text-center">
                        <label class="form-label fw-semibold d-block text-start">Gambar Saat Ini</label>
                        <img src="{{ $news->og_image }}" alt="OG Image" style="max-width:100%; max-height:200px; border-radius:10px; object-fit:cover;">
                    </div>
                @endif

                <form action="{{ route('admin.news.update', $news) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="headline" class="form-label fw-semibold">Headline Berita <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('headline') is-invalid @enderror"
                            id="headline" name="headline" value="{{ old('headline', $news->headline) }}" required>
                        @error('headline')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold">Keterangan Singkat <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                            id="description" name="description" rows="3" required>{{ old('description', $news->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label fw-semibold">Link Berita <span class="text-danger">*</span></label>
                        <input type="url" class="form-control @error('link') is-invalid @enderror"
                            id="link" name="link" value="{{ old('link', $news->link) }}" required>
                        @error('link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                            @foreach(['Pemerintahan', 'Pembangunan', 'Sosial', 'Pendidikan', 'Kesehatan', 'Ekonomi', 'Budaya', 'Lainnya'] as $cat)
                                <option value="{{ $cat }}" {{ old('category', $news->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="refresh_image" name="refresh_image" value="1">
                        <label class="form-check-label" for="refresh_image">
                            <i class="bi bi-arrow-repeat me-1"></i> Perbarui gambar dari link berita
                        </label>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-accent">
                            <i class="bi bi-check-lg me-1"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
