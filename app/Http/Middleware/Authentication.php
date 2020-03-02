<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Providers\RouteServiceProvider;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = '')
    {
        if (auth()->check() && auth()->user()->getRole() == User::ROLES[$role]) {
            return $next($request);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
