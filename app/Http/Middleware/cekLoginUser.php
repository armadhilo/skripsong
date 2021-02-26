<?php

namespace App\Http\Middleware;

use Closure;

class cekLoginUser
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
        if(session('role') != 'User'){
            return redirect('/');
        }
        return $next($request);
    }
}
