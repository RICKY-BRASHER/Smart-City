<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class mailcontrol
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('email_attente')) { // Vérifie si l'email en attente de vérification est présent dans la session
            return redirect()->route('inscrit')->with('error', 'Aucun email en attente de vérification.'); // Redirige vers la page d'accueil avec un message d'erreur  
        }
        return $next($request);
    }
}
