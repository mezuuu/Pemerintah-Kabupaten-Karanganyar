<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminApproved
{
    /**
     * Handle an incoming request.
     * Check if the authenticated user is approved and has admin access.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if (!auth()->user()->is_approved) {
            auth()->logout();
            return redirect()->route('admin.login')->with('error', 'Akun Anda belum disetujui oleh administrator.');
        }

        return $next($request);
    }
}
