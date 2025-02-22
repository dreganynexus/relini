<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->id == 1) {
            return $next($request);
        }

        return redirect('/admin/login');
    }
}
