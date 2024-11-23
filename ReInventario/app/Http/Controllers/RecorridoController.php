<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecorridoController extends Controller
{
    public function guardarRecorrido(Request $request)
    {
        // Validar datos
        $request->validate([
            'tipo' => 'required|in:diario,semanal',
            // Agua Potable
            'cisterna_wc' => 'nullable|integer|min:0|max:200',
            'cisterna_pluvial' => 'nullable|integer|min:0|max:100',
            'bomba_tratada_1' => 'nullable|in:si,no',
            'bomba_tratada_2' => 'nullable|in:si,no',
            // Agua Caliente
            'caldera_1' => 'nullable|in:encendido,apagado',
            'caldera_2' => 'nullable|in:encendido,apagado',
            'bomba_flujo_1' => 'nullable|in:encendido,apagado',
            'bomba_flujo_2' => 'nullable|in:encendido,apagado',
            // Gases Medicinales
            'compresora_1' => 'nullable|in:encendido,apagado',
            'compresora_2' => 'nullable|in:encendido,apagado',
            'secadora_1' => 'nullable|in:encendido,apagado',
            'secadora_2' => 'nullable|in:encendido,apagado',
            // Eléctrico
            'planta_emergencia' => 'nullable|in:encendido,apagado',
            'tab_gn1' => 'nullable|in:funcionando,revision',
            'tab_gn2' => 'nullable|in:funcionando,revision',
            'paneles_solares' => 'nullable|in:funcionando,revision',
            // Aire Acondicionado
            'presion_bombas_chiller' => 'nullable|integer|min:0',
            'bomba_chiller_1' => 'nullable|in:funcionando,revision',
            'bomba_chiller_2' => 'nullable|in:funcionando,revision',
            'bomba_chiller_3' => 'nullable|in:funcionando,revision',
            // Contra Incendios
            'panel_alarmas' => 'nullable|in:sin_alarmas,con_alarmas',
            'tablero_bombas' => 'nullable|in:sin_alarmas,con_alarmas',
            // Observaciones
            'observaciones' => 'nullable|string|max:255',
            // Nombre del encargado
            'nombre_encargado' => 'required|string|max:100',
        ]);

        // Crear el resumen y las recomendaciones
        $resumen = [];
        $recomendaciones = [];

        // Agua Potable
        if ($request->filled('cisterna_wc')) {
            $resumen['Nivel Cisterna WC'] = $request->cisterna_wc . '%';
            if ($request->cisterna_wc < 50) {
                $recomendaciones[] = 'ABRIR LLAVE DE LLENADO DE CISTERNA.';
            } elseif ($request->cisterna_wc > 100) {
                $recomendaciones[] = 'REALIZAR TRASVASE DE AGUA PLUVIAL.';
            }
        }
        if ($request->filled('cisterna_pluvial')) {
            $resumen['Nivel Cisterna Pluvial'] = $request->cisterna_pluvial . '%';
            if ($request->cisterna_pluvial > 70) {
                $recomendaciones[] = 'REALIZAR TRASVASE DE AGUA.';
            }
        }
        if ($request->filled('bomba_tratada_1')) {
            $resumen['Bomba Agua Tratada 1'] = ucfirst($request->bomba_tratada_1);
        }
        if ($request->filled('bomba_tratada_2')) {
            $resumen['Bomba Agua Tratada 2'] = ucfirst($request->bomba_tratada_2);
        }

        // Agua Caliente
        foreach (['caldera_1', 'caldera_2', 'bomba_flujo_1', 'bomba_flujo_2'] as $campo) {
            if ($request->filled($campo)) {
                $resumen[ucwords(str_replace('_', ' ', $campo))] = ucfirst($request->$campo);
            }
        }

        // Gases Medicinales
        foreach (['compresora_1', 'compresora_2', 'secadora_1', 'secadora_2'] as $campo) {
            if ($request->filled($campo)) {
                $resumen[ucwords(str_replace('_', ' ', $campo))] = ucfirst($request->$campo);
            }
        }

        // Eléctrico
        foreach (['planta_emergencia', 'tab_gn1', 'tab_gn2', 'paneles_solares'] as $campo) {
            if ($request->filled($campo)) {
                $resumen[ucwords(str_replace('_', ' ', $campo))] = ucfirst($request->$campo);
            }
        }

        // Aire Acondicionado
        if ($request->filled('presion_bombas_chiller')) {
            $resumen['Presión Bombas Chiller'] = $request->presion_bombas_chiller . ' PSI';
            if ($request->presion_bombas_chiller < 60) {
                $recomendaciones[] = 'REVISAR FUNCIONAMIENTO DE BOMBAS CHILLER.';
            }
        }
        foreach (['bomba_chiller_1', 'bomba_chiller_2', 'bomba_chiller_3'] as $campo) {
            if ($request->filled($campo)) {
                $resumen[ucwords(str_replace('_', ' ', $campo))] = ucfirst($request->$campo);
            }
        }

        // Contra Incendios
        foreach (['panel_alarmas', 'tablero_bombas'] as $campo) {
            if ($request->filled($campo)) {
                $resumen[ucwords(str_replace('_', ' ', $campo))] = ucfirst($request->$campo);
            }
        }

        // Observaciones
        if ($request->filled('observaciones')) {
            $resumen['Observaciones'] = $request->observaciones;
        }

        // Guardar en sesión
        session([
            'nombre_encargado' => $request->nombre_encargado,
            'resumen' => $resumen,
            'recomendaciones' => $recomendaciones,
        ]);

        // Redirigir con éxito
        return redirect()->route('tipo_recorrido')->with('success', 'Recorrido guardado exitosamente.');
    }

    public function mostrarFormulario($tipo)
    {
        // Validar que el tipo sea "diario" o "semanal"
        if (!in_array($tipo, ['diario', 'semanal'])) {
            abort(404); // Muestra un error 404 si el tipo no es válido
        }

        // Retornar la vista del formulario con el tipo de recorrido
        return view('formulario_recorrido', compact('tipo'));
    }

    public function limpiarSesion()
    {
        // Elimina las variables de sesión relacionadas con el resumen
        session()->forget(['nombre_encargado', 'resumen', 'recomendaciones']);
        return response()->json(['success' => true]);
    }
}

