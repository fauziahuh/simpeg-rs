<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserLevel
{

    public function handle($request, Closure $next, $level)
    {

        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
         * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
         */
        
        $user = auth()->user();

        // Mengecek apakah pengguna terautentikasi
        if (!$user) {
            return redirect()->route('login');
        }

        // Mengecek user level pengguna dan memberikan akses untuk pengguna terkait
        if ($user->user_level == $level) {
            return $next($request);
        }

        // Mengembalikan ke laman Dashboard
        return redirect()->route('home.index');
    }

}

