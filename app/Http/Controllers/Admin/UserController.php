<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display all users.
     */
    public function index()
    {
        $users = User::latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Create a new user account.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin'),
            'is_approved' => true, // Admin-created accounts are auto-approved
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Akun berhasil dibuat!');
    }

    /**
     * Approve a pending user.
     */
    public function approve(User $user)
    {
        $user->update(['is_approved' => true]);
        return redirect()->route('admin.users.index')->with('success', "Akun {$user->name} berhasil disetujui!");
    }

    /**
     * Reject / revoke approval.
     */
    public function reject(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Anda tidak dapat menonaktifkan akun Anda sendiri.');
        }
        $user->update(['is_approved' => false]);
        return redirect()->route('admin.users.index')->with('success', "Akun {$user->name} berhasil ditolak.");
    }

    /**
     * Delete a user account.
     */
    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Akun berhasil dihapus!');
    }
}
