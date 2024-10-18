@extends('layouts.app')

@section('titulo', 'Portada')

@section('content')
<div class="text-center mt-5">                                      
    <img src="{{ asset('images/logoconfondo.png') }}" alt="Logo" class="img-fluid" style="max-width: 400px;"> <!-- Responsivo -->
    <h1>Universidad Politecnica de Queretaro</h1>
    <h2>Ingenieria en Sistemas Computacionales</h2>
    <p>Nombre: Santiago Amaya Lopez</p>
    <p>Docente: Ivan Isay Guerra Lopez</p>

    <a href="{{ route('portada') }}" class="btn btn-primary">Repaso</a>
</div>
@endsection
