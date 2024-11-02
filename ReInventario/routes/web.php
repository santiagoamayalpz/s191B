<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecorridoController;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () { return view('portada'); })->name('portada');

Route::get('/tipo-recorrido', function () { return view('tipo_recorrido'); })->name('tipo_recorrido');

Route::get('/formulario-recorrido/{tipo}', function ($tipo) { return view('formulario_recorrido', compact('tipo')); })->name('formulario_recorrido');

Route::post('/guardar-recorrido', [RecorridoController::class, 'guardarRecorrido'])->name('guardar_recorrido');

