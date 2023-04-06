<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Auth;

class UserAuth
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
        if(Auth::check()) {
            if( Auth::user()->hasRole('user')){
                return $next($request);
            }
        }
        Auth::logout();
        return redirect()->route('user.login');
    }
}
