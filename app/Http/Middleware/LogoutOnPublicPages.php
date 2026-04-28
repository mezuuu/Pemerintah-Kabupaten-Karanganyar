<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogoutOnPublicPages
{
    /**
     * If an authenticated admin visits a non-admin page,
     * automatically log them out so they must re-login
     * when returning to the admin panel.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return $next($request);
    }
}
