<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to access the admin panel.');
        }

        // if (!Auth::user()->isAdmin()) {
        //     return redirect()->route('index')->with('error', 'You do not have admin privileges.');
        // }

        return $next($request);
    }
}