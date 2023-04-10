<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Manager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        // If the user has Admin or Manager role, redirect to requested page
        // If not, redirect to dashboard main page
        if ($user && $user->role === 'admin' || $user->role === 'manager'){
            return $next($request);
        }
        return redirect()->route('dashboard');
    }
}
