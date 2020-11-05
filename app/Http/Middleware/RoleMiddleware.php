<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roleName)
    {
        if(! $request->user()->hasRole($roleName))
        {
            if(Auth::user()->hasRole('admin')) {
                return redirect('/admin');
            }

            if(Auth::user()->hasRole('adminupbjj')) {
                return redirect('/adminupbjj');
            }

            if(Auth::user()->hasRole('unit')) {
                return redirect('/unit');
            }

            if(Auth::user()->hasRole('pemantau')) {
                return redirect('/pemantau');
            }

            if(Auth::user()->hasRole('upbjj')) {
                return redirect('/upbjj');
            }

            if(Auth::user()->hasRole('pjtu')) {
                return redirect('/pjtu');
            }
           
        }
        return $next($request);
    }
}
