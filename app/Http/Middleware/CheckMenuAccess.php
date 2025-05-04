<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMenuAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $menuName): Response
    {
        $user = auth()->user();
        foreach ($user->roles as $role) {
            if ($role->menus()->where('name', $menuName)->exists()) {
                return $next($request);
            }
        }
        abort(403, 'Unauthorized access to menu');
    }
}
