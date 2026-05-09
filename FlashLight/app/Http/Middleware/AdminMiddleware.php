<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // On vérifie si l'utilisateur est connecté ET s'il est admin
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Sinon, on le redirige vers l'accueil client avec un message d'erreur
        return redirect()->route('home')->with('error', 'Accès réservé aux administrateurs.');
    }

}
