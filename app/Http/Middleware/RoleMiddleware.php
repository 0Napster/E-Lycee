<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->isAdmin() && Auth::user()->isStudent()) {
            return redirect('/student')->with(['title' => 'Interdit', 'message' => 'Vous n\'avez pas les droits pour accéder à cet espace!', 'type' => 'warning']);;
        }

        return $next($request);
    }
}
