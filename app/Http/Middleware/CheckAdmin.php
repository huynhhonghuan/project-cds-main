<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $user =User::with('getRoles')->where('id', $request->user()->id)->get();
        // $role = $user[0]->getRoles[0];
        if(!$request->user()->Check_Admin())
        {
            abort(403);
        }
        return $next($request);
    }
}
