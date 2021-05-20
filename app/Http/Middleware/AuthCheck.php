<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('LoggedUser') && ($request->path() != '/login')) {
            return redirect('/login');
        }

        if (!session()->has('LoggedUser') && ($request->path() == '/login')) {
            return back();
        }
        return $next($request);
    }
}
