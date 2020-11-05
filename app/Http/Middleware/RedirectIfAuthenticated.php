<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard == 'admin')->check()) {
            return redirect('/admin');
        }

        elseif (Auth::guard($guard == 'adminupbjj')->check()) {
            return redirect('/adminupbjj');
        }

        elseif (Auth::guard($guard == 'unit')->check()) {
            return redirect('/unit');
        }

        elseif (Auth::guard($guard == 'pemantau')->check()) {
            return redirect('/pemantau');
        }

        elseif (Auth::guard($guard == 'upbjj')->check()) {
            return redirect('/upbjj');
        }

        elseif (Auth::guard($guard == 'pjtu')->check()) {
            return redirect('/pjtu');
        }

        return $next($request);
    }
}
