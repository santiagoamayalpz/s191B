@extends ('layouts.plantilla1')

@section('titulo','formulario clientes')

{{--para encerrar los contenidos y me de una buena estructura--}}

  @section('contenido')

{{--inicia la tarjeta de formulario--}}
<div class="container mt-5 col-md-8">

<div class="card text-justify font-monospace">
    <div class="card-header fs-5 text-primary">
        Aleman Sosa Mauricio Gael 
    </div>

    <div class="card-body">
        <h5 class="fw-bold"> mauricioalemansosa@gmail.com</h5>
        <h5 class="fw-medium"> 7621222315 </h5>
        <p class="card-text fw-lihgter"></p>
    </div>

    <div class="card-footer text-muted">
        <button type="submit" class="btn btn-warning btn-sm"> {{ __('Actualizar')}} </button>
        <button type="submit" class="btn btn-danger btn-sm"> {{ __('Eliminar')}} </button>
    </div>

</div>
</div>
{{--para delimitar la seccion de codigo--}}
@endsection
