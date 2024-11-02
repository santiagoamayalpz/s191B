<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecorridoController extends Controller
{
        public function guardarRecorrido(Request $request)
    {
    $request->validate([
        'agua_potable' => 'required|in:realizado,pendiente,observacion',
        'agua_caliente' => 'required|in:realizado,pendiente,observacion',
        'gases_medicinales' => 'required|in:realizado,pendiente,observacion',
        'electrico' => 'required|in:realizado,pendiente,observacion',
        'aire_acondicionado' => 'required|in:realizado,pendiente,observacion',
        'sistema_contra_incendios' => 'required|in:realizado,pendiente,observacion',
        'observaciones' => 'nullable|string|max:255',
        'nombre_encargado' => 'required|string|max:100',
    ]);

    // Guardar los datos en la sesión
    session()->flash('nombre_encargado', $request->nombre_encargado);
    session()->flash('resumen', [
        'agua_potable' => $request->agua_potable,
        'agua_caliente' => $request->agua_caliente,
        'gases_medicinales' => $request->gases_medicinales,
        'electrico' => $request->electrico,
        'aire_acondicionado' => $request->aire_acondicionado,
        'sistema_contra_incendios' => $request->sistema_contra_incendios,
        'observaciones' => $request->observaciones,
    ]);

    return redirect()->route('tipo_recorrido');
    }
}
