<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageGestion;
use App\Http\Controllers\Process;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Pages d'affichage via le contrôleur PageGestion
Route::get('/inscription', [PageGestion::class, 'Inscription'])->name('inscrit');
Route::get('/connexion',   [PageGestion::class, 'connexion'])->name('connexion');
Route::get('/users',       [PageGestion::class, 'users'])->name('users');

// Vérification du code
Route::get('/verif_code', function () {
    return view('code');
})->name('verif_code');

// Pages légales
Route::get('/conditions',      function () { return view('terms');   })->name('terms');
Route::get('/confidentialite', function () { return view('privacy'); })->name('privacy');


Route::post('/inscript_city', [Process::class, 'inscription'])->name('valid_inscription');
Route::post('/connect_city',  [Process::class, 'connexion'])->name('valid_connexion');
Route::post('/control',       [Process::class, 'verifycode'])->name('valid_verif_code');
Route::post('/rscode',        [Process::class, 'renvoyercode'])->name('resend_code');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [PageGestion::class, 'admin'])->name('admin');

    // Ajoute ici tes autres routes protégées...
});



