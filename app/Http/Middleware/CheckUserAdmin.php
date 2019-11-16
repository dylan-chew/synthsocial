<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //if user is logged in and they have the role of user admin
        if (Auth::user() && Auth::user()->hasRole('user admin')) {
            return $next($request);
        }

        return redirect()->route('home')
            ->with('error','You have no permission for that page!');
    }
}
