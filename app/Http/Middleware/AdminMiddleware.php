<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user yang login adalah admin
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect('/');  // Redirect ke halaman utama jika bukan admin
        }

        return $next($request);
    }
}
