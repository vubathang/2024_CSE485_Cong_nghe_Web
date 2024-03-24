<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $userRole
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $userRole)
    {
        if (auth()->check() && auth()->user()->role == $userRole) {
            return $next($request);
        }

        return response()->json(['message' => 'You do not have permission to access this page.']);
    }
}
