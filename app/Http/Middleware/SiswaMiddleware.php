<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;

class SiswaMiddleware
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
        if(!$request->session()->has('loggedSiswa')){
            return back()->with("tembak","Not Authorized");
        }
        return $next($request);
    }
}
