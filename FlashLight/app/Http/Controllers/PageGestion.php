<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageGestion extends Controller
{
    function Inscription()
    {
        return view('Layout.inscript_city');
    }
    function connexion()
    {
        return view('Layout.login');
    }
    function admin()
    {
        return view('admin.admin');
    }
    function users()
    {
        return view('Client.home');
    }

}
