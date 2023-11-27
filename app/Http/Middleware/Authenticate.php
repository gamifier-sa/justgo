<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            $url = $request->url();

            if (Str::contains($url, 'dashboard')) {
                return route('dashboard.login');
            } 
        }

        return null; // Return null if the request expects JSON
    }
}
