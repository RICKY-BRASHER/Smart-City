<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

// 1. Page d'inscription (racine du site)
Route::get('/', function () {
    return view('welcome'); // ou 'inscription' si c'est votre page d'accueil
})->name('home');

//2. Routes pour les pages statiques
Route::get('/inscription', function () {
    return view('inscription');
})->name('register'); // Nom de route pour l'inscription

Route::get('/login', function () {
    return view('login');
})->name('login'); // Nom de route pour la connexion

// 3. La route pour les conditions (corrige l'erreur de la ligne 496)
Route::get('/conditions', function () {
    return view('terms'); // Assurez-vous d'avoir un fichier terms.blade.php dans views/
})->name('terms');

// 4. La route pour la confidentialité (corrige l'erreur de la ligne 498)
Route::get('/confidentialite', function () {
    return view('privacy'); // Assurez-vous d'avoir un fichier privacy.blade.php dans views/
})->name('privacy');

// 5. Ajoutez ceci en bas des autres routes
Route::middleware(['auth'])->group(function () {
    // Routes protégées (accessibles uniquement après connexion)
    Route::get('/admin', function () {
        return view('admin'); // Assurez-vous d'avoir un fichier admin.blade.php
    })->name('admin');

    // Autres routes protégées...
});
