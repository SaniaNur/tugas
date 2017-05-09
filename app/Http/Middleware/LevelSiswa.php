<?php

namespace App\Http\Middleware;

use Closure;
<<<<<<< HEAD
use auth;

=======
use Auth;
>>>>>>> 533e9e9adb055c277fc5e76d67e9aefdb59e3463
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
<<<<<<< HEAD
        
        if(Auth::user()->level != "Siswa"){
            return redirect ('/forbidden');
        }

        
=======
        if(Auth::user()->level != 'Siswa'){
             return redirect ('/forbidden');
        }
>>>>>>> 533e9e9adb055c277fc5e76d67e9aefdb59e3463
        return $next($request);
    }
}
