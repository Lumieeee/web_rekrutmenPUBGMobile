<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // Pastikan tidak mengarah ke /login terus-menerus
            if ($request->routeIs('login.index') || $request->routeIs('login')) {
                return $next($request);
            }

            return redirect()->route('login.index');
        }

        return $next($request);
    }
}
