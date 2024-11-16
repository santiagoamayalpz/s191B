@extends('layouts.app')

@section('title', 'Formulario de Recorrido - ReInventario')

@section('content')
<div class="container mt-5">
    <h2>Formulario de Recorrido - {{ $tipo == 'diario' ? 'Recorrido Diario' : 'Recorrido Semanal' }}</h2>
    <form action="{{ route('guardar_recorrido') }}" method="POST">
        @csrf

        <div class="form-group mt-3">
            <label>Agua Potable</label>
            <select class="form-control" name="agua_potable" id="aguaPotableSelect">
                <option value="realizado">Realizado</option>
                <option value="pendiente">Pendiente</option>
                <option value="observacion">Observación</option>
            </select>
        </div>

        <!-- Otros campos del formulario aquí... -->

        <div class="form-group mt-3">
            <label>Observaciones</label>
            <textarea class="form-control" name="observaciones"></textarea>
        </div>

        <div class="form-group mt-3">
            <label>Nombre del Encargado</label>
            <input type="text" class="form-control" name="nombre_encargado" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Finalizar recorrido</button>
    </form>
</div>

<script>
    document.getElementById('aguaPotableSelect').addEventListener('change', function() {
        if (this.value === 'realizado' || this.value === 'pendiente' || this.value === 'observacion') {
            window.location.href = "{{ route('formulario_agua_potable') }}"; // Redirige a la vista de Agua Potable
        }
    });
</script>
@endsection
