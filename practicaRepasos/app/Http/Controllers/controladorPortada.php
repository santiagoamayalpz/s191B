<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controladorPortada extends Controller
{
    public function mostrarPortada() {
        return view('portada');
    }
}
