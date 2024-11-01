<!-- resources/views/inicio.blade.php -->
@extends('layouts.app')

@section('contenido')
    <h1>Bienvenido a la Biblioteca</h1>

    <!-- Ejemplo de noticia -->
    <div class="card mb-3">
        <div class="card-body">
            <img src="{{ asset('images/image.png') }}" class="card-img-top" alt="Imagen de la noticia literaria">
            <h5 class="card-title">Un poeta captura las historias de vida, amor y pérdida de la gente en Gaza</h5>
            <p class="card-text">La voz de Mosab Abu Toha es suave y melódica cuando recita su poesía desde su nuevo hogar en Nueva York. Pero cuando el poeta palestino describe a las personas y los momentos que inspiraron su escritura, su tono se llena de emoción.</p>
            <p class="card-text"><small class="text-muted">Publicado el {{ date('d/m/Y') }}</small></p>
        </div>
    </div>

    <!-- Pie de página -->
    <footer class="text-center mt-4">
        <p>&copy; {{ date('Y') }} Nombre de la Biblioteca. Todos los derechos reservados.</p>
    </footer>
@endsection
