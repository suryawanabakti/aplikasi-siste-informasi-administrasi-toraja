<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (auth()->user()->roles[0]->name == 'admin') {
                    return redirect(RouteServiceProvider::HOME);
                }
                if (auth()->user()->roles[0]->name == 'kepala desa') {
                    return redirect(RouteServiceProvider::HOME3);
                }
                return redirect(RouteServiceProvider::HOME2);
            }
        }

        return $next($request);
    }
}
