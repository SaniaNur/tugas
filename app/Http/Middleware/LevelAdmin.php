<?php

namespace App\Http\Middleware;

use Closure;
use auth;

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
}
