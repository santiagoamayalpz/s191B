<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorPortada;

/* Route::get('/', function () {return view('welcome');}); */
Route::get('/', [App\Http\Controllers\controladorPortada::class, 'mostrarPortada'])->name('portada');
