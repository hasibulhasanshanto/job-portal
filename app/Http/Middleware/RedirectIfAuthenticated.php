<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
        // if (Auth::guard($guard)->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }

        if (Auth::guard($guard)->check() && Auth::user()->role->id == 1) {

            return redirect()->route('superadmin.dashboard');
        } elseif (Auth::guard($guard)->check() && Auth::user()->role->id == 2) {

            return redirect()->route('admin.dashboard');
        } elseif (Auth::guard($guard)->check() && Auth::user()->role->id == 3) {

            return redirect()->route('company.dashboard');
        } elseif (Auth::guard($guard)->check() && Auth::user()->role->id == 4) {

            return redirect()->route('home');
        } else {
            return $next($request);
        }
    }
}
