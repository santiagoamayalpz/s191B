<?php

use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () { return view('inicio'); })->name('inicio');

Route::get('/registro', function () { return view('registro'); })->name('registro');
