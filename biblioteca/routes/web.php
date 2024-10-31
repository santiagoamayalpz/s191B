<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorLibros;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [controladorLibros::class, 'inicio'])->name('inicio');

Route::get('/registro', [controladorLibros::class, 'registro'])->name('registro');

Route::post('/guardar-libro', [controladorLibros::class, 'guardar'])->name('guardarLibro');
