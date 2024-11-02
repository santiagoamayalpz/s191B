<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validadorLibros;

class controladorLibros extends Controller
{
    public function inicio()
    {
        return view('inicio');
    }

    public function registro()
    {
        return view('registro');
    }

    public function guardar(validadorLibros $peticion)
    {
    // Aquí puedes guardar el libro en la base de datos o realizar otra acción

    // Mensaje de éxito con Alertify
    return back()->with('success', "Todo correcto: Libro '{$peticion->titulo}' guardado");
    }
}


