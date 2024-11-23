@extends('layouts.app')

@section('title', 'Tipo de Recorrido - ReInventario')

@section('content')
<div class="container text-center mt-5">
    <h2>¿Qué tipo de recorrido deseas realizar?</h2>
    <a href="{{ route('formulario_recorrido', ['tipo' => 'diario']) }}" class="btn btn-primary mt-3">Recorrido Diario</a>
    <a href="{{ route('formulario_recorrido', ['tipo' => 'semanal']) }}" class="btn btn-primary mt-3">Recorrido Semanal</a>
</div>

<!-- Modal para mostrar el resumen -->
@if(session('nombre_encargado') && session('resumen'))
<div class="modal fade" id="resumenModal" tabindex="-1" aria-labelledby="resumenModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resumenModalLabel">Resumen del Recorrido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nombre del Encargado:</strong> {{ session('nombre_encargado') }}</p>
                <ul>
                    @foreach (session('resumen') as $key => $value)
                        <li><strong>{{ $key }}:</strong> {{ $value }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('nombre_encargado') && session('resumen'))
            var resumenModal = new bootstrap.Modal(document.getElementById('resumenModal'));
            resumenModal.show();

            // Limpiar las variables de sesión después de mostrar el modal
            fetch("{{ route('limpiar_sesion') }}", { method: "POST", headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" } });
        @endif
    });
</script>
@endsection
