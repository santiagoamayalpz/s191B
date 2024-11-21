<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorVistas;
use App\Http\Controllers\clienteController;

Route::get('/',[controladorVistas::class,'home'])->name('inicio');
/* Route::get('/formulario',[controladorVistas::class,'insert'])->name('formu'); */
Route::get('/consultar',[controladorVistas::class,'select'])->name('consulta');



/*Route::get('/', function () {
    return view('welcome');
});
*/

/* Route::view('/','inicio')->name('inicio');

Route::view('/formulario','formulario')->name('formu');

Route::view('/consultar','clientes')->name('consulta'); */

Route::view('/component','componentes')->name('rutacomponent');

Route::post('/enviarCliente',[controladorVistas::class, 'procesaCliente'])->name('rutaenviar');

//clienteController

Route::get('/cliente/create',[clienteController::class,'create'])->name('formu');