<?php

namespace App\Http\Middleware;

use Closure;

use Auth;


class LevelGuru
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
        
        if(Auth::user()->level != "Guru"){
            return redirect ('/forbidden');
        }

        
         if(Auth::user()->level != "Guru"){
            return redirect ('/forbidden');
        }

        return $next($request);
    }
}
