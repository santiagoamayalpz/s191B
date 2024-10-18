@extends('layouts.app') 

@section('titulo', 'Repaso 1') <!-- Título de la página -->

@section('Contenido')
<div class="container mt-5">
    <h2>Convertidor de Unidades</h2>
    <form method="POST" action="{{ route('convertir') }}">
        @csrf <!-- Nuestro token de acceso -->
        <!-- Espacio para ingresar MB -->
        <div class="form-group mb-3">
            <label for="mb">MB a GB</label>
            <input type="text" class="form-control" id="mb" name="mb" placeholder="Ingresa MB">
        </div>

        <!-- Espacio para ingresar GB -->
        <div class="form-group mb-3">
            <label for="gb">GB a MB</label>
            <input type="text" class="form-control" id="gb" name="gb" placeholder="Ingresa GB">
        </div>

        <!-- Espacio para ingresar TB -->
        <div class="form-group mb-3">
            <label for="tb">TB a GB</label>
            <input type="text" class="form-control" id="tb" name="tb" placeholder="Ingresa TB">
        </div>

        <!-- Espacio para ingresar GB -->
        <div class="form-group mb-3">
            <label for="tb">GB a TB</label>
            <input type="text" class="form-control" id="gb" name="gb" placeholder="Ingresa GB">
        </div>

        <!-- Botón para enviar el formulario -->
        <button type="submit" class="btn btn-primary">Convertir</button>
    </form>

    <!-- Mostramos el resultado de la conversión -->
    @if(session('resultado'))
        <div class="alert alert-success mt-4">
            {{ session('resultado') }}
        </div>
    @endif
</div>
@endsection
