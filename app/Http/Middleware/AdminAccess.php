<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * @var \App\Models\User
         */
        $user = $request->user();
        if (!$user->hasAnyRole(\App\Models\Role::where('admin_access', '=', true)->get('id'))) {
            abort(401);
        }

        return $next($request);
    }
}
