<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = auth()->user();
        $userRole = $user->partner->isNotEmpty() ? 'partner' : 'player';

        if (!in_array((string) $userRole, $roles, true)) {
            throw new AuthenticationException('Unauthorized');
        }

        return $next($request);
    }
}
