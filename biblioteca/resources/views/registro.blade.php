<!-- resources/views/registro.blade.php -->
@extends('layouts.app')

@section('contenido')
    <h1>Registro de Libro</h1>

    @if (session('success'))
        <script>
            alertify.success("{{ session('success') }}");
        </script>
    @endif

    <form action="{{ route('guardarLibro') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn') }}">
            <small class="text-danger fst-italic">{{ $errors->first('isbn') }}</small>
        </div>
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}">
            <small class="text-danger fst-italic">{{ $errors->first('titulo') }}</small>
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" value="{{ old('autor') }}">
            <small class="text-danger fst-italic">{{ $errors->first('autor') }}</small>
        </div>
        <div class="form-group">
            <label for="paginas">Páginas</label>
            <input type="number" class="form-control" id="paginas" name="paginas" min="1" value="{{ old('paginas') }}">
            <small class="text-danger fst-italic">{{ $errors->first('paginas') }}</small>
        </div>
        <div class="form-group">
            <label for="anio">Año</label>
            <input type="number" class="form-control" id="anio" name="anio" min="1000" max="{{ date('Y') }}" value="{{ old('anio') }}">
            <small class="text-danger fst-italic">{{ $errors->first('anio') }}</small>
        </div>
        <div class="form-group">
            <label for="editorial">Editorial</label>
            <input type="text" class="form-control" id="editorial" name="editorial" value="{{ old('editorial') }}">
            <small class="text-danger fst-italic">{{ $errors->first('editorial') }}</small>
        </div>
        <div class="form-group">
            <label for="email">Correo de la Editorial</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            <small class="text-danger fst-italic">{{ $errors->first('email') }}</small>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection

