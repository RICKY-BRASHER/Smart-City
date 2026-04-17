<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\PageGestion;

Route::get('/', function () {
<<<<<<< Updated upstream
    return view('welcome');
})->name('welcome');
Route::get('/inscription', [PageGestion::class, 'Inscription'])->name('inscrit');
Route::get('/connexion', [PageGestion::class, 'connexion'])->name('connexion');
Route::get('/admin', [PageGestion::class, 'admin'])->name('admin');
Route::get('/users', [PageGestion::class, 'users'])->name('users');
Route::post('/inscript_city', [App\Http\Controllers\Process::class, 'inscription'])->name('valid_inscription');
Route::post('/connect_city', [App\Http\Controllers\Process::class, 'connexion'])->name('valid_connexion');
Route::get('/verif_code', function () {
    return view('code');
})->name('verif_code');
Route::post('/control', [App\Http\Controllers\Process::class, 'verifycode'])->name('valid_verif_code');
Route::post('/rscode', [App\Http\Controllers\Process::class, 'renvoyercode'])->name('resend_code');
=======
    return view('welcome'); // ou 'inscription' si c'est votre page d'accueil
})->name('home');


//2. Routes pour les pages statiques
Route::get('/inscription', function () {
    return view('inscription');
})->name('register'); // Nom de route pour l'inscription

Route::get('/login', function () {
    return view('login');
})->name('login'); // Nom de route pour la connexion

Route::get('/admin', function () {
    return view('admin');
})->name('admin'); // Nom de route pour la connexion

Route::get('/users', function () {
    return view('users');
})->name('users'); // Nom de route pour la connexion


// 3. La route pour les conditions (corrige l'erreur de la ligne 496)
Route::get('/conditions', function () {
    return view('terms'); // Assurez-vous d'avoir un fichier terms.blade.php dans views/
})->name('terms');

// 4. La route pour la confidentialité (corrige l'erreur de la ligne 498)
Route::get('/confidentialite', function () {
    return view('privacy'); // Assurez-vous d'avoir un fichier privacy.blade.php dans views/
})->name('privacy');

/5. Ajoutez ceci en bas des autres routes
Route::middleware(['auth'])->group(function () {
    // Routes protégées (accessibles uniquement après connexion)
    Route::get('/admin', function () {
        return view('admin'); // Assurez-vous d'avoir un fichier admin.blade.php
    })->name('admin');

    // Autres routes protégées...
});
>>>>>>> Stashed changes
