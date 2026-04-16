<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\PageGestion;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/inscription', [PageGestion::class, 'Inscription'])->name('inscrit');
Route::get('/connexion', [PageGestion::class, 'connexion'])->name('connexion');
Route::get('/admin', [PageGestion::class, 'admin'])->name('admin');
Route::get('/users', [PageGestion::class, 'users'])->name('users');
