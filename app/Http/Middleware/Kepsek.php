<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Kepsek
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        // ROLE KEPSEK

        if($userRole == 0)
        {
        return redirect()->route('dashboard'); 
        }
        if($userRole == 1)
        {
            return $next($request);
        }
        if($userRole == 2)
        {
            return redirect()->route('wakasek.dashboard');
        }
        if($userRole == 3)
        {
            return redirect()->route('walikelas.dashboard');
        }
        if($userRole == 4)
        {
            return redirect()->route('siswa.dashboard');
        }
        if($userRole == 5)
        {
            return redirect()->route('petugas.dashboard');
        }
    }
}
