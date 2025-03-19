<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    /**
     * Vérifie si l'utilisateur est un administrateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('employees')->check() && Auth::guard('employees')->user()->isAdmin()) {
            return $next($request);
        }

        // Sinon, on le redirige
        return redirect()->route('dashboard')->with('error', 'Accès refusé.');
    }
}
