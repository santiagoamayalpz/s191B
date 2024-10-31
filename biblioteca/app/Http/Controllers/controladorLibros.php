<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function guardar(Request $request)
    {
        $request->validate([
            'isbn' => 'required|numeric|min_digits:13',
            'titulo' => 'required|string|max:150',
            'autor' => 'required|string',
            'paginas' => 'required|integer|min:1',
            'anio' => 'required|integer|between:1000,' . date('Y'),
            'editorial' => 'required|string',
            'email' => 'required|email', 
            ]);
    // Aquí puedes guardar el libro en la base de datos o realizar otra acción

    // Mensaje de éxito con Alertify
    return back()->with('success', "Todo correcto: Libro '{$request->titulo}' guardado");
    }
}


