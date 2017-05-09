<?php

namespace App\Http\Middleware;

use Closure;
<<<<<<< HEAD
use auth;
=======
use Auth;
>>>>>>> 533e9e9adb055c277fc5e76d67e9aefdb59e3463

class LevelAdmin
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
        
        if(Auth::user()->level != "Admin"){
            return redirect ('/forbidden');
        }

        
        return $next($request);
    }
<<<<<<< HEAD
=======

>>>>>>> 533e9e9adb055c277fc5e76d67e9aefdb59e3463
}
