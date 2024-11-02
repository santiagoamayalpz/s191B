@extends('layouts.app')

@section('title', 'Tipo de Recorrido - ReInventario')

@section('content')
<div class="container text-center mt-5">
    <h2>¿Qué tipo de recorrido deseas realizar?</h2>
    <a href="{{ route('formulario_recorrido', ['tipo' => 'diario']) }}" class="btn btn-primary mt-3">Recorrido Diario</a>
    <a href="{{ route('formulario_recorrido', ['tipo' => 'semanal']) }}" class="btn btn-primary mt-3">Recorrido Semanal</a>
</div>

<!-- Incluir el componente de resumen solo si hay datos en la sesión -->
@if(session('nombre_encargado') && session('resumen'))
    <x-resumen :nombre-encargado="session('nombre_encargado')" :resumen="session('resumen')" />
@endif
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('nombre_encargado'))
            var resumenModal = new bootstrap.Modal(document.getElementById('resumenModal'));
            resumenModal.show();
        @endif
    });
</script>
@endsection

