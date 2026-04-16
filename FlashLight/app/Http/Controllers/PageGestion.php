<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageGestion extends Controller
{
    function Inscription()
    {
        return view('inscript_city');
    }
    function connexion()
    {
        return view('login');
    }
    function admin()
    {
        return view('admin');
    }
    function users()
    {
        return view('users');
    }

}
