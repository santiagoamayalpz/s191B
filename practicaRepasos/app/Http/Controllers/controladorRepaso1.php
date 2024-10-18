<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controladorRepaso1 extends Controller
{
    /* metodo para convertir las unidades */
    public function convertir(Request $request)
    {
        $resultado = ''; /* Nuestra variable para guardar nuestro resultado */

        /* Conversión de MB a GB */
        if ($request->filled('mb')) {
            $gb = $request->mb / 1024;
            $resultado = $request->mb . ' MB son ' . number_format($gb, 2) . ' GB';
        }

        /* Conversión de GB a MB */
        if ($request->filled('gb')) {
            $mb = $request->gb * 1024;
            $resultado = $request->gb . ' GB son ' . number_format($mb, 2) . ' MB';
        }

        /* Conversión de TB a GB */
        if ($request->filled('tb')) {
            $gb = $request->tb * 1024;
            $resultado = $request->tb . ' TB son ' . number_format($gb, 2) . ' GB';
        }

        /* Conversión de GB a TB */
        if ($request->filled('gb')) {
            $gb = $request->gb / 1024;
            $resultado = $request->gb . ' GB son ' . number_format($gb, 2) . ' TB';
        }

        // Redirigir de nuevo a la vista con el resultado
        return redirect()->route('repaso1')->with('resultado', $resultado);
    }
}
