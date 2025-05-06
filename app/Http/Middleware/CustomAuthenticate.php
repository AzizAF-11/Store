<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class CustomAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // If the route is dashboard-pembeli and user is not authenticated, redirect to home
        if ($request->routeIs('dashboard.pembeli') || $request->is('dashboard-pembeli*')) {
            return route('home');
        }

        // For other routes, use the default behavior (redirect to login)
        return $request->expectsJson() ? null : route('login');
    }
}