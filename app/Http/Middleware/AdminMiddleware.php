<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is admin or staff
        if (Auth::check() && in_array(Auth::user()->role, ['admin', 'staff'])) {
            return $next($request);
        }

        // Redirect to a different page if not authorized
        return redirect('/');
    }
}
