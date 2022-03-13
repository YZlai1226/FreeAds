<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        error_log("in middleware Isadmin 1");
        if (Auth::user() &&  Auth::user()->admin == 1) {
            error_log("in middleware Isadmin 2");
            return $next($request);
     }
    error_log("in middleware Isadmin 3");
    abort(403, 'Unauthorized action.');
    }
}
