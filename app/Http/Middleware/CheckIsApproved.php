<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIsApproved
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->is_approved) {
            Auth::logout();
            return redirect()->route('login')->withErrors('Akun belum disetujui admin.');
        }

        return $next($request);
    }
}
