<?php

namespace App\Http\Middleware;

use Closure;

class cekLoginAdmin
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
        if(session('role') != 'Admin'){
            return redirect('/');
        }
        return $next($request);
    }
}
