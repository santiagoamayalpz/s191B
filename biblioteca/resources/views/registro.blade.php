<!-- resources/views/registro.blade.php -->
@extends('layouts.app')

@section('contenido')
    <h1>Registro de Libro</h1>
    <form action="{{ route('guardarLibro') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required>
        </div>
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" required>
        </div>
        <div class="form-group">
            <label for="paginas">Páginas</label>
            <input type="number" class="form-control" id="paginas" name="paginas" min="1" required>
        </div>
        <div class="form-group">
            <label for="anio">Año</label>
            <input type="number" class="form-control" id="anio" name="anio" min="1000" max="{{ date('Y') }}" required>
        </div>
        <div class="form-group">
            <label for="editorial">Editorial</label>
            <input type="text" class="form-control" id="editorial" name="editorial" required>
        </div>
        <div class="form-group">
            <label for="email">Correo de la Editorial</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection

