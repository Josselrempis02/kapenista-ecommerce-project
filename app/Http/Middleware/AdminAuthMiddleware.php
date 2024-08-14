<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
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
        // Check if the user is authenticated as an admin
        if (!Auth::guard('admin')->check()) {
            // Redirect to the admin login page if not authenticated
            return redirect()->route('admin-login');
        }

        // Allow the request to proceed
        return $next($request);
    }
}
