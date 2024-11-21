@extends ('layouts.plantilla1')
@section('titulo','formulario clientes')

{{--para encerrar los contenidos y me de una buena estructura--}}
  @section('contenido')

{{--inicia la tarjeta de formulario--}}
<div class="container mt-5 col-md-6">
{{--@dump($id)--}}

{{-- Mensaje de éxito --}}
@if (session('exito'))
<x-Alert tipo="success">{{ session('exito') }}</x-Alert>  
@endif

{{-- Mensaje de error (nuevo agregado para errores) --}}
@if (session('error'))
<x-Alert tipo="danger">{{ session('error') }}</x-Alert>  
@endif

<div class="card font-monospace">
  <div class="card-header fs-5 text-center text-primary">
    {{-- Título dinámico según acción (Registro o Edición) --}}
    {{ isset($cliente) ? __('Editar Cliente') : __('Registro de Clientes') }}
  </div>
  <div class="card-body text-justify">
    {{-- Acción del formulario dinámica (Registrar o Actualizar) --}}
    <form method="POST" action="{{ isset($cliente) ? route('updatecliente', $cliente->id) : route('rutaenviar') }}">
      @csrf
      {{-- Método PUT solo si se está editando --}}
      @if(isset($cliente))
          @method('PUT')
      @endif
    <div class="mb-3">
      <label for="Nombre" class="form-label"> {{ __('Nombre:')}} </label>
      <input type="text" class="form-control" name="txtnombre" value="{{ $cliente->nombre ?? old('txtnombre') }}" required>
      <small class="text-danger fst-italic" > {{ $errors->first('txtnombre') }} </small>
  </div>
  <div class="mb-3">
      <label for="Apellido" class="form-label"> {{ __('Apellido:')}} </label>
      <input type="text" class="form-control" name="txtapellido" value="{{ $cliente->apellido ?? old('txtapellido') }}" required>
      <small class="text-danger fst-italic" > {{ $errors->first('txtapellido') }} </small>
  </div>
  <div class="mb-3">
      <label for="correo" class="form-label"> {{ __('Correo:')}} </label>
      <input type="email" class="form-control" name="txtcorreo" value="{{ $cliente->correo ?? old('txtcorreo') }}" required>
      <small class="text-danger fst-italic" > {{ $errors->first('txtcorreo') }} </small>
  </div>
  <div class="mb-3">
      <label for="telefono" class="form-label"> {{ __('Telefono:')}} </label>
      <input type="text" class="form-control" name="txttelefono" value="{{ $cliente->telefono ?? old('txttelefono') }}" required>
      <small class="text-danger fst-italic" > {{ $errors->first('txttelefono') }} </small>
  </div>

  <div class="card-footer text-muted">
    <div class="d-grid gap-2 mt-2 mb-1">
      <button type="submit" class="btn btn-success btn-sm">  {{ isset($cliente) ? __('Actualizar Cliente') : __('Guardar Cliente') }}</button>
    </div>
  </form>
  </div>
</div>
</div>
</body>
</html>
{{--para delimitar la seccion de codigo--}}
@endsection