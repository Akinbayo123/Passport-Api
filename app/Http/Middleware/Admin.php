<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    //Admin Middleware
    public function handle(Request $request, Closure $next): Response
    {
        return auth()->user()->role==UserRole::Admin->value ? $next($request):abort(403,'Unauthorized');
    }
}
