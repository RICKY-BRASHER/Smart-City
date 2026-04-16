<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\PageGestion;

Route::get('/', function () {
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