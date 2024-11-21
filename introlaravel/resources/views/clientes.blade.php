

@extends ('layouts.plantilla1')
  @section(section: 'contenido')

  <div class="container mt-5 col-md-8">
  @foreach ($consultarClientes as $cliente)


  <div class="card text-justify font-monospace mt-3">
      <div class="card-header fs-5 text-primary">
          {{$cliente->nombre}}
      </div>

      <div class="card-body">
          <h5 class="fw-bold"> {{$cliente->correo}}</h5>
          <h5 class="fw-medium"> {{$cliente->telefono}} </h5>
          <p class="card-text fw-lihgter"></p>
      </div>

      <div class="card-footer text-muted">
            <a href="{{ route('editcliente', $cliente->id) }}" class="btn btn-warning btn-sm">Actualizar</a>
          
            {{-- Formulario para eliminar con confirmación --}}
            <form action="{{ route('destroycliente', $cliente->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estas seguro de que desea eliminar este cliente?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form>
      </div>
  </div>
@endforeach
</div>
@endsection