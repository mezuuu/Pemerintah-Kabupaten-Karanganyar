@extends('admin.layouts.app')

@section('title', 'Kelola Link Menu')
@section('page-title', 'Kelola Link Menu')

@section('content')
    <p class="text-muted mb-4">Kelola URL link untuk setiap menu navigasi pada website</p>

    @foreach($groups as $group)
        <div class="admin-table mb-4">
            <div class="d-flex justify-content-between align-items-center px-3 py-2 border-bottom" style="background:#f8f9fa;">
                <h6 class="mb-0 fw-bold" style="font-size:0.9rem;">
                    <i class="bi bi-folder2-open me-2 text-muted"></i>{{ $group }}
                </h6>
                <span class="badge bg-secondary" style="font-size:0.72rem;">{{ isset($menuLinks[$group]) ? $menuLinks[$group]->count() : 0 }} link</span>
            </div>

            @if(isset($menuLinks[$group]))
                @foreach($menuLinks[$group] as $link)
                    <div class="d-flex align-items-center justify-content-between px-3 py-2 border-bottom link-row">
                        {{-- Left: Label & URL --}}
                        <div class="flex-grow-1 me-3" style="min-width:0;">
                            <div class="fw-semibold" style="font-size:0.88rem;">{{ $link->label }}</div>
                            <a href="{{ $link->url }}" target="_blank" class="text-muted text-decoration-none d-block text-truncate" style="font-size:0.78rem;">
                                {{ $link->url }}
                            </a>
                        </div>

                        {{-- Right: Edit button --}}
                        <button class="btn btn-sm btn-outline-primary flex-shrink-0" title="Edit"
                            onclick="openEditModal({{ $link->id }}, '{{ $link->group }}', '{{ addslashes($link->label) }}', '{{ addslashes($link->url) }}', {{ $link->is_external ? 'true' : 'false' }})">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </div>
                @endforeach
            @else
                <div class="text-center py-4 text-muted" style="font-size:0.85rem;">
                    <i class="bi bi-link-45deg d-block mb-1" style="font-size:1.3rem;"></i>
                    Belum ada link untuk grup ini.
                </div>
            @endif
        </div>
    @endforeach

    {{-- Edit Link Modal --}}
    <div class="modal fade" id="editLinkModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit Link Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editLinkForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_group" class="form-label fw-semibold">Grup Menu</label>
                            <input type="text" class="form-control bg-light" id="edit_group" name="group" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="edit_label" class="form-label fw-semibold">Label / Nama</label>
                            <input type="text" class="form-control" id="edit_label" name="label" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_url" class="form-label fw-semibold">URL</label>
                            <input type="url" class="form-control" id="edit_url" name="url" required>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_is_external" name="is_external" value="1">
                            <label class="form-check-label" for="edit_is_external">Buka di tab baru (link eksternal)</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-accent">
                            <i class="bi bi-check-lg me-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function openEditModal(id, group, label, url, isExternal) {
        document.getElementById('editLinkForm').action = '/admin/menu-links/' + id;
        document.getElementById('edit_group').value = group;
        document.getElementById('edit_label').value = label;
        document.getElementById('edit_url').value = url;
        document.getElementById('edit_is_external').checked = isExternal;
        new bootstrap.Modal(document.getElementById('editLinkModal')).show();
    }
</script>
@endsection
