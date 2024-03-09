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
            // if (Auth::guard($guard)->check()) {
            //     return redirect(RouteServiceProvider::HOME);
            // }
            if (Auth::guard($guard)->check() && Auth::user()->getvaitro[0] == 'ad') {
                return redirect()(RouteServiceProvider::ADMIN);
            }
            if (Auth::guard($guard)->check() && Auth::user()->getvaitro[0] == 'cvt') {
                return redirect()(RouteServiceProvider::CONGTACVIEN);
            }
            if (Auth::guard($guard)->check() && Auth::user()->getvaitro[0] == 'dn') {
                return redirect()(RouteServiceProvider::DOANHNHGIEP);
            }
            if (Auth::guard($guard)->check() && Auth::user()->getvaitro[0] == 'cg') {
                return redirect()(RouteServiceProvider::CHUYENGIA);
            }
            if (Auth::guard($guard)->check() && Auth::user()->getvaitro[0] == 'hhdn') {
                return redirect()(RouteServiceProvider::HOIDOANHNGHIEP);
            }
        }

        return $next($request);
    }
}
