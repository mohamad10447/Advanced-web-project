<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, string $role)
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect('/')->with('error', 'Access denied');
        }

        return $next($request);
    }
}
