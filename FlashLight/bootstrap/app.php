<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo('/connexion'); 
        $middleware->redirectUsersTo('/home');
        $middleware->alias([
        'mailcontrol' => \App\Http\Middleware\MailControl::class, // Vérifie bien le nom de la classe
        'mailacess' => \App\Http\Middleware\MailAcess::class, // Vérifie bien le nom de la classe
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
