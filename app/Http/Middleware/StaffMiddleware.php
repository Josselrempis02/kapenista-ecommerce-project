<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class StaffMiddleware
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
        if (!Auth::guard('staff')->check()) {
            // If the user is not authenticated as staff, redirect them to the staff login page
            Log::info('Admin not authenticated. Redirecting to admin login.');
            return redirect()->route('admin-login');
        }

        return $next($request);
    }
}
