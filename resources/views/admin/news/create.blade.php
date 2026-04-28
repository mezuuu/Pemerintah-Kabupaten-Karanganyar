@extends('admin.layouts.app')

@section('title', 'Tambah Berita')
@section('page-title', 'Tambah Berita Baru')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="admin-table p-4">
                <form action="{{ route('admin.news.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="headline" class="form-label fw-semibold">Headline Berita <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('headline') is-invalid @enderror"
                            id="headline" name="headline" value="{{ old('headline') }}"
                            placeholder="Masukkan judul berita" required>
                        @error('headline')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold">Keterangan Singkat <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                            id="description" name="description" rows="3"
                            placeholder="Masukkan deskripsi singkat berita" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label fw-semibold">Link Berita <span class="text-danger">*</span></label>
                        <input type="url" class="form-control @error('link') is-invalid @enderror"
                            id="link" name="link" value="{{ old('link') }}"
                            placeholder="https://contoh.com/berita/judul-berita" required>
                        @error('link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            <i class="bi bi-info-circle me-1"></i> Gambar akan otomatis diambil dari website berita
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="category" class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                            <option value="Pemerintahan" {{ old('category') == 'Pemerintahan' ? 'selected' : '' }}>Pemerintahan</option>
                            <option value="Pembangunan" {{ old('category') == 'Pembangunan' ? 'selected' : '' }}>Pembangunan</option>
                            <option value="Sosial" {{ old('category') == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                            <option value="Pendidikan" {{ old('category') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                            <option value="Kesehatan" {{ old('category') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                            <option value="Ekonomi" {{ old('category') == 'Ekonomi' ? 'selected' : '' }}>Ekonomi</option>
                            <option value="Budaya" {{ old('category') == 'Budaya' ? 'selected' : '' }}>Budaya</option>
                            <option value="Lainnya" {{ old('category') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-accent">
                            <i class="bi bi-check-lg me-1"></i> Simpan Berita
                        </button>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
