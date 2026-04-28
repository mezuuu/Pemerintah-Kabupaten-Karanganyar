@extends('admin.layouts.app')

@section('title', 'Edit Berita')
@section('page-title', 'Edit Berita')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="admin-table p-4">

                {{-- Current Image Preview --}}
                @if($news->display_image)
                    <div class="mb-4">
                        <label class="form-label fw-semibold d-block">Gambar Saat Ini</label>
                        <div class="position-relative d-inline-block">
                            <img src="{{ $news->display_image }}" alt="Gambar Berita"
                                style="max-width:100%; max-height:200px; border-radius:10px; object-fit:cover; border:2px solid #dee2e6;">
                            @if($news->manual_image)
                                <span class="badge bg-success position-absolute top-0 end-0 m-2" style="font-size:0.7rem;">
                                    <i class="bi bi-upload me-1"></i>Manual
                                </span>
                            @else
                                <span class="badge bg-info position-absolute top-0 end-0 m-2" style="font-size:0.7rem;">
                                    <i class="bi bi-globe me-1"></i>Otomatis (OG)
                                </span>
                            @endif
                        </div>
                    </div>
                @endif

                <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
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

                    {{-- Manual Image Upload --}}
                    <div class="mb-3">
                        <label for="manual_image" class="form-label fw-semibold">
                            Ganti / Upload Gambar Manual <span class="text-muted fw-normal">(Opsional)</span>
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

                    {{-- Remove manual image option --}}
                    @if($news->manual_image)
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="remove_manual_image" name="remove_manual_image" value="1">
                            <label class="form-check-label text-danger" for="remove_manual_image">
                                <i class="bi bi-trash me-1"></i> Hapus gambar manual (gunakan gambar otomatis)
                            </label>
                        </div>
                    @endif

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
                            <i class="bi bi-arrow-repeat me-1"></i> Perbarui gambar otomatis (OG) dari link berita
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
