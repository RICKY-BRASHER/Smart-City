<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageGestion;
use App\Http\Controllers\Process;

// Pages légales
Route::get('/conditions',      function () { return view('Layout.terms');   })->name('terms');
Route::get('/confidentialite', function () { return view('Layout.privacy'); })->name('privacy');




Route::middleware('mailcontrol')->group(function () {
    Route::get('/verif_code', function () {
        return view('Layout.code');
    })->name('verif_code');
    Route::post('/control',       [Process::class, 'verifycode'])->name('valid_verif_code');
    Route::post('/rscode',        [Process::class, 'renvoyercode'])->name('resend_code');
});
Route::middleware('guest')->group(function () {
    Route::middleware('mailacess')->group(function () {
        Route::get('/inscription', [PageGestion::class, 'Inscription'])->name('inscrit');
        Route::get('/connexion',   [PageGestion::class, 'connexion'])->name('connexion');
        Route::post('/inscript_city', [Process::class, 'inscription'])->name('valid_inscription');
        Route::post('/connect_city',  [Process::class, 'connexion'])->name('valid_connexion');
        Route::get('/', function () {
            return view('Layout.welcome');
        })->name('welcome');
    });
    
});
Route::middleware(['auth'])->group(function () { // Protéger les routes qui nécessitent une authentification
    Route::get('/deconnexion', [Process::class, 'deconnexion'])->name('deconnexion');
    Route::post('/submit-signalement', [Process::class, 'sendsignalement'])->name('signalement');
    // Routes pour les pages client
    Route::get('/signaler', function () {
        $categories = \App\Models\Categorie::all(); // Récupérer les catégories depuis la base de données
        return view('Client.signalement', compact('categories')); // Passer les catégories à la
    })->name('signaler');
    Route::get('/home', function () {
        return view('Client.home');
    })->name('home');
    Route::get('/carte_user', function () {
        return view('Client.carte_u');
    })->name('carte_user');
    Route::get('/liste_signalements', function () {
        $listesignalements = \App\Models\signalement::where('id_user', auth()->user()->id)->get(); // Récupérer les signalements de l'utilisateur connecté
        return view('Client.liste_signal', compact('listesignalements')); // Passer
    })->name('mes_signalements');
    Route::get('/profil_user', function () {
        $listesignalements = \App\Models\signalement::where('id_user', auth()->user()->id)->get(); // Récupérer les signalements de l'utilisateur connecté
        return view('Client.profil_u', compact('listesignalements')); // Passer les signalements à la vue du profil
    })->name('profil_u');
    Route::post('/edit_profil', [Process::class, 'editprofil'])->name('edit_profil');
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
    })->name('voir_signalement');

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
});

