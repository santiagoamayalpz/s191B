@extends ('layouts.plantilla1')

@section('titulo','componentes blade')

@section('contenido')

    <x-Card encabezado="componente" titulo="titulo 1" textoBoton="Guardar">Contenido de la tajeta 1</x-Card>

    <x-Card encabezado="componente" titulo="titulo 2" textoBoton="No Guardar">Contenido de la tajeta 2</x-Card>

    <x-Alert tipo="danger">Rojo</x-Alert>

    <x-Alert tipo="warning">amarillo</x-Alert>
@endsection

