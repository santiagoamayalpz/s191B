<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecorridoController;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () { return view('portada'); })->name('portada');

Route::get('/tipo-recorrido', function () { return view('tipo_recorrido'); })->name('tipo_recorrido');

Route::get('/formulario-recorrido/{tipo}', [RecorridoController::class, 'mostrarFormulario'])->name('formulario_recorrido');

Route::post('/guardar-recorrido', [RecorridoController::class, 'guardarRecorrido'])->name('guardar_recorrido');

Route::get('/formulario-agua-potable', function () { return view('agua_potable'); })->name('formulario_agua_potable');

Route::post('/limpiar-sesion', [RecorridoController::class, 'limpiarSesion'])->name('limpiar_sesion');