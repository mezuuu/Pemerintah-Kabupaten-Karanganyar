@extends('admin.layouts.app')

@section('title', 'Tambah Berita')
@section('page-title', 'Tambah Berita Baru')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="admin-table p-4">
                <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
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
                            <i class="bi bi-info-circle me-1"></i> Gambar akan otomatis diambil dari website berita (OG Image)
                        </div>
                    </div>

                    {{-- Manual Image Upload --}}
                    <div class="mb-3">
                        <label for="manual_image" class="form-label fw-semibold">
                            Gambar Manual <span class="text-muted fw-normal">(Opsional)</span>
                        </label>
                        <input type="file" class="form-control @error('manual_image') is-invalid @enderror"
                            id="manual_image" name="manual_image" accept="image/jpeg,image/png,image/webp"
                            onchange="previewImage(this)">
                        @error('manual_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            <i class="bi bi-image me-1"></i> Upload gambar manual jika gambar otomatis tidak tersedia. Format: JPG, PNG, WebP. Maks: 2MB.
                        </div>
                        {{-- Preview --}}
                        <div id="image-preview-wrapper" class="mt-2" style="display:none;">
                            <img id="image-preview" src="" alt="Preview" style="max-width:100%; max-height:200px; border-radius:10px; object-fit:cover; border:2px solid #dee2e6;">
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

    <script>
        function previewImage(input) {
            const wrapper = document.getElementById('image-preview-wrapper');
            const preview = document.getElementById('image-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    wrapper.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                wrapper.style.display = 'none';
                preview.src = '';
            }
        }
    </script>
@endsection
