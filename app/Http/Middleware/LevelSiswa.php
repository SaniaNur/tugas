<?php

namespace App\Http\Middleware;

use Closure;
use auth;

class LevelSiswa
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
        
        if(Auth::user()->level != "Siswa"){
            return redirect ('/forbidden');
        }

        
        return $next($request);
    }
}
