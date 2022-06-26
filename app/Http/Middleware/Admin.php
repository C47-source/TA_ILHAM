<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->router('login');
        }
        if (Auth::user()->level == 'admin') {
            return $next($request);
        }
        if (Auth::user()->level == 'teknisi') {
            return redirect('/login');
        }
        if (Auth::user()->level == 'pelanggan') {
            return redirect('/login');
        }
    }
}
