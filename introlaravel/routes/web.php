<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorVistas;
use App\Http\Controllers\clienteController;





/*Route::get('/', function () {
    return view('welcome');
});
*/

/* Route::view('/','inicio')->name('inicio');

Route::view('/formulario','formulario')->name('formu');

Route::view('/consultar','clientes')->name('consulta'); */

Route::view('/component','componentes')->name('rutacomponent');



//clienteController

Route::get('/cliente/create',[clienteController::class,'create'])->name('formu');
Route::post('/cliente',[clienteController::class, 'store'])->name('rutaenviar');

Route::get('/',[clienteController::class,'home'])->name('inicio');
/* Route::get('/formulario',[controladorVistas::class,'insert'])->name('formu'); */
Route::get('/cliente',[clienteController::class,'index'])->name('consulta');

Route::get('/cliente/{id}/edit', [clienteController::class, 'edit'])->name('editcliente');

Route::put('/cliente/{id}', [clienteController::class, 'update'])->name('updatecliente');

Route::delete('/cliente/{id}', [clienteController::class, 'destroy'])->name('destroycliente');
