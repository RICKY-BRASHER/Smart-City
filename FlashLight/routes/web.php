<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageGestion;
use App\Http\Controllers\Process;


Route::get('/', function () {
    return view('Layout.welcome');
})->name('welcome');

// Pages d'affichage via le contrôleur PageGestion
Route::get('/inscription', [PageGestion::class, 'Inscription'])->name('inscrit');
Route::get('/connexion',   [PageGestion::class, 'connexion'])->name('connexion');
Route::get('/users',       [PageGestion::class, 'users'])->name('users');

// Vérification du code
Route::get('/verif_code', function () {
    return view('Layout.code');
})->name('verif_code');

// Pages légales
Route::get('/conditions',      function () { return view('Layout.terms');   })->name('terms');
Route::get('/confidentialite', function () { return view('Layout.privacy'); })->name('privacy');


Route::post('/inscript_city', [Process::class, 'inscription'])->name('valid_inscription');
Route::post('/connect_city',  [Process::class, 'connexion'])->name('valid_connexion');
Route::post('/control',       [Process::class, 'verifycode'])->name('valid_verif_code');
Route::post('/rscode',        [Process::class, 'renvoyercode'])->name('resend_code');

Route::get('/admin', [PageGestion::class, 'admin'])->name('admin');
Route::get('/user', [PageGestion::class, 'user'])->name('user');
Route::middleware(['auth'])->group(function () {
    
 
    // Ajoute ici tes autres routes protégées... 
});
Route::post('/submit-signalement', [Process::class, 'sendsignalement'])->name('signalement');
// Routes pour les pages client
Route::get('/signaler', function () {
    return view('Client.signalement');
})->name('signaler');
Route::get('/home', function () {
    return view('Client.home');
})->name('home');
Route::get('/carte_user', function () {
    return view('Client.carte_u');
})->name('carte_user');
Route::get('/liste_signalements', function () {
    return view('Client.liste_signal');
})->name('mes_signalements');
Route::get('/profil_user', function () {
    return view('Client.profil_u');
})->name('profil_u');
Route::get('notif', function () {
    return view('Client.notif');
})->name('notif');

//route vers les pages admin
Route::get('/accueil', function () {
    return view('Admin.accueil');
})->name('accueil');

Route::get('/admin', function () {
    return view('Admin.accueil');
})->name('admin');


Route::get('/signalement', function () {
    return view('Admin.signalement');
})->name('signalement');

Route::get('/agents', function () {
    return view('Admin.agents');
})->name('agents');

Route::get('/carte', function () {
    return view('Admin.carte');
})->name('carte');

Route::get('/categories', function () {
    return view('Admin.categories');
})->name('categories');

Route::get('/commentaires', function () {
    return view('Admin.commentaires');
})->name('commentaires');

Route::get('/liste_users', function () {
    return view('Admin.liste_users');
})->name('liste_users');

Route::get('/notification', function () {
    return view('Admin.notification');
})->name('notification');

Route::get('/parametre', function () {
    return view('Admin.parametre');
})->name('parametre');
