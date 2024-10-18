@extends('layouts.app') <!-- Mandamos nuestra plantilla a 'layouts/app.blade.php' -->

@section('titulo', 'Portada')

@section('Contenido')
<div class="text-center mt-5">                                      
    <img src="{{ asset('images/logoconfondo.png') }}" alt="Logo" class="img-fluid" style="max-width: 400px;"> <!-- class="img-fluid" Responsivo -->
    <h1>Universidad Politecnica de Queretaro</h1> 
    <h2>Ingenieria en Sistemas Computacionales</h2>
    <p>Nombre: Santiago Amaya Lopez</p>
    <p>Docente: Ivan Isay Guerra Lopez</p>

    <a href="{{ route('repaso1') }}" class="btn btn-primary">repaso1</a><!-- Nuestro boton de repaso1 con su ruta -->
    
</div>
@endsection
