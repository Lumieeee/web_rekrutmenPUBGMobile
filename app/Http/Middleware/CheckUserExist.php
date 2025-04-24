<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user() === null) {
            Auth::logout(); // Logout otomatis jika akun tidak ditemukan
            return redirect()->route('login.index')->withErrors(['login' => 'Akun Anda telah dihapus!']);
        }

        return $next($request);
    }
}
