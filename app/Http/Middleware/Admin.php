<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /**
         * Check current_user is authorize or not to access admin routes.
         */
        if (auth()->check()) {
            if (auth_user()->isSuperAdmin() || auth_user()->isAdmin()) {
                return $next($request);
            }
            return redirect('/posts');
        }
        return redirect('/login');
    }
}
