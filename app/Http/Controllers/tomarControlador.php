<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tomarControlador extends Controller
{
    public function home(){
        return view('home');
    }

    public function clave($id)
    {
        return view('clave', compact('id'));
    }
}
