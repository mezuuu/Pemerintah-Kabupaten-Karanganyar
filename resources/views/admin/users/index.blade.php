@extends('admin.layouts.app')

@section('title', 'Kelola Akun')
@section('page-title', 'Kelola Akun Pengguna')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <p class="text-muted mb-0">Kelola akun pengguna admin panel dan persetujuan pendaftaran</p>
        <button class="btn btn-accent" data-bs-toggle="modal" data-bs-target="#createUserModal">
            <i class="bi bi-plus-lg me-1"></i> Buat Akun Baru
        </button>
    </div>

    <div class="admin-table">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Terdaftar</th>
                        <th style="width:180px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="fw-semibold">{{ $user->name }}</td>
                            <td class="text-muted">{{ $user->username }}</td>
                            <td class="text-muted">{{ $user->email }}</td>
                            <td>
                                @if($user->is_admin)
                                    <span class="badge-admin">Admin</span>
                                @else
                                    <span class="badge bg-light text-dark" style="font-size:0.78rem">Editor</span>
                                @endif
                            </td>
                            <td>
                                @if($user->is_approved)
                                    <span class="badge-approved"><i class="bi bi-check-circle me-1"></i>Aktif</span>
                                @else
                                    <span class="badge-pending"><i class="bi bi-clock me-1"></i>Pending</span>
                                @endif
                            </td>
                            <td class="text-muted" style="font-size:0.85rem">{{ $user->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    @if(!$user->is_approved)
                                        <form action="{{ route('admin.users.approve', $user) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-outline-success" title="Setujui">
                                                <i class="bi bi-check-lg"></i>
                                            </button>
                                        </form>
                                    @else
                                        @if($user->id !== auth()->id())
                                            <form action="{{ route('admin.users.reject', $user) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-outline-warning" title="Nonaktifkan">
                                                    <i class="bi bi-pause-circle"></i>
                                                </button>
                                            </form>
                                        @endif
                                    @endif

                                    @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-people fs-2 d-block mb-2"></i>
                                Belum ada pengguna lain.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div class="p-3 border-top">
                {{ $users->links() }}
            </div>
        @endif
    </div>

    {{-- Create User Modal --}}
    <div class="modal fade" id="createUserModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Buat Akun Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="modal_username" class="form-label fw-semibold">Username</label>
                            <input type="text" class="form-control" id="modal_username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="modal_password" class="form-label fw-semibold">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="modal_password" name="password" required minlength="6">
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePw('modal_password', this)">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" value="1">
                            <label class="form-check-label" for="is_admin">Jadikan sebagai Admin</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-accent">
                            <i class="bi bi-person-plus me-1"></i> Buat Akun
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function togglePw(inputId, btn) {
        const input = document.getElementById(inputId);
        const icon = btn.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        }
    }
</script>
@endsection
