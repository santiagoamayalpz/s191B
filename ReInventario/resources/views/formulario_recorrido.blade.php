@extends('layouts.app')

@section('title', 'Formulario de Recorrido - ReInventario')

@section('content')
<div class="container mt-5">
    <h2>Formulario de Recorrido - {{ $tipo == 'diario' ? 'Recorrido Diario' : 'Recorrido Semanal' }}</h2>
    <form action="{{ route('guardar_recorrido') }}" method="POST">
        @csrf

        <div class="form-group mt-3">
            <label>Agua Potable</label>
            <select class="form-control" name="agua_potable">
                <option value="realizado">Realizado</option>
                <option value="pendiente">Pendiente</option>
                <option value="observacion">Observación</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label>Agua Caliente</label>
            <select class="form-control" name="agua_caliente">
                <option value="realizado">Realizado</option>
                <option value="pendiente">Pendiente</option>
                <option value="observacion">Observación</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label>Gases Medicinales</label>
            <select class="form-control" name="gases_medicinales">
                <option value="realizado">Realizado</option>
                <option value="pendiente">Pendiente</option>
                <option value="observacion">Observación</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label>Eléctrico</label>
            <select class="form-control" name="electrico">
                <option value="realizado">Realizado</option>
                <option value="pendiente">Pendiente</option>
                <option value="observacion">Observación</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label>Aire Acondicionado</label>
            <select class="form-control" name="aire_acondicionado">
                <option value="realizado">Realizado</option>
                <option value="pendiente">Pendiente</option>
                <option value="observacion">Observación</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label>Sistema Contra Incendios</label>
            <select class="form-control" name="sistema_contra_incendios">
                <option value="realizado">Realizado</option>
                <option value="pendiente">Pendiente</option>
                <option value="observacion">Observación</option>
            </select>
        </div>

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
@endsection

