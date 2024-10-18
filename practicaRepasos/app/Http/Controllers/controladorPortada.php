<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controladorPortada extends Controller
{
    /* Este es nuestro metodo para mandar a nuestra vista Portada */
    public function mostrarPortada() {
        return view('portada');
    }
}
