<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorPortada;  // Importamos el controlador de portada
use App\Http\Controllers\controladorRepaso1;  // importamos el controlador de repaso1

/* Route::get('/', function () {return view('welcome');}); */

// Ruta para la portada, vamos a utilizar nuestro controlador 'controladorPortada' y llama al método 'mostrarPortada'. Le asignamos el nombre de portada.
Route::get('/', [App\Http\Controllers\controladorPortada::class, 'mostrarPortada'])->name('portada');

/* Ruta para nuestra vista de 'repaso1', cargamos directamente la vista 'repaso1.blade.php' desde la carpeta 'resources/views' ya que la funcionalidad de nuestra
vista va a estar directamente en nuestro controlador, asi que puede ser estatica */
Route::get('/repaso1', function () { return view('repaso1'); })->name('repaso1');

/* Ruta POST tiene el formulario para la conversión en 'repaso1'. usa el controlador 'controladorRepaso1' llama al método 'convertir' para hacer la logica de conversion. 
le asignamos el nombre 'convertir'. */
Route::post('/convertir', [App\Http\Controllers\controladorRepaso1::class, 'convertir'])->name('convertir');
