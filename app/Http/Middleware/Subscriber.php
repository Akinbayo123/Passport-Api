<?php

namespace App\Http\Middleware;

use Closure;
use App\Enums\UserRole;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Subscriber
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    //Subscriber Middleware
    public function handle(Request $request, Closure $next): Response
    {
        return auth()->user()->role==UserRole::Subscriber->value ? $next($request): abort(403,'Unauthorized');
    }
}
