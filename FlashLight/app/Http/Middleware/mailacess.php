<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class mailacess
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('email_attente')) { // Vérifie si l'email en attente de vérification est présent dans la session
            return redirect()->route('verif_code')->with('error', 'Vous devez vérifier votre email avant de continuer.'); // Redirige vers la page de vérification du code avec un message d'erreur 
        }
        return $next($request);
    }
}
