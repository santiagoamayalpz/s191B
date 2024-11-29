<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorVistas;
use App\Http\Controllers\clienteController;


//nuevas rutas de tipo get/igual van a tener sobrenombres
// en los controladores ponemos los 

Route::get('/',[controladorVistas::class,'home'])->name('inicio');

Route::get('/consultar',[controladorVistas::class,'select'])->name('consulta');

Route::post('/enviarCliente',[controladorVistas::class,'procesaCliente'])->name('rutaenvia');


/* rutas para trabajar con clientecontroller*/

Route::get('/cliente/create',[clienteController::class,'create'])->name('formu');



/*Route::get('/', function () {
    return view('welcome');
});
*/

/* Route::view('/','inicio')->name('inicio');

Route::view('/formulario','formulario')->name('formu');

Route::view('/consultar','clientes')->name('consulta'); */

Route::view('/component','componentes')->name('rutacomponent');