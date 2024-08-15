<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }
    
        // If the request is for the admin area, redirect to admin login
        if ($request->is('admin/*')) {
            return route('admin-login');
        }
    
        // Default redirect to user login
        return route('login');
    }
    

}
