@extends('layouts.app')

@section('title', 'Formulario de Recorrido - ' . ucfirst($tipo))

@section('content')
    <h2 class="text-center mb-4">Formulario de Recorrido - {{ ucfirst($tipo) }}</h2>

    <!-- Botón de Regresar -->
    <div class="mb-4 text-start">
        <button type="button" class="btn btn-danger" onclick="confirmBack()">Regresar</button>
    </div>

    <form action="{{ route('guardar_recorrido') }}" method="POST">
        @csrf
        <input type="hidden" name="tipo" value="{{ $tipo }}">

        <!-- Agua Potable -->
        <div class="col-md-6 mb-4">
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#modal-agua-potable">
                    Agua Potable
                </button>
                <span id="status-agua-potable" class="badge bg-secondary">Pendiente</span>
            </div>
        </div>
        <div class="modal fade" id="modal-agua-potable" tabindex="-1" aria-labelledby="modalLabel-agua-potable" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel-agua-potable">Formulario de Agua Potable</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="cisterna-wc" class="form-label">Nivel Cisterna de Servicio WC (%)</label>
                            <input type="number" name="cisterna_wc" id="cisterna-wc" class="form-control" min="0" max="200" required>
                        </div>
                        <div class="mb-3">
                            <label for="cisterna-pluvial" class="form-label">Nivel Cisterna de Agua Pluvial (%)</label>
                            <input type="number" name="cisterna_pluvial" id="cisterna-pluvial" class="form-control" min="0" max="100" required>
                        </div>
                        <div class="mb-3">
                            <label for="bomba-tratada-1" class="form-label">Funcionamiento Bomba Agua Tratada 1</label>
                            <select name="bomba_tratada_1" id="bomba-tratada-1" class="form-select" required>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="bomba-tratada-2" class="form-label">Funcionamiento Bomba Agua Tratada 2</label>
                            <select name="bomba_tratada_2" id="bomba-tratada-2" class="form-select" required>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-success" onclick="saveStatus('agua-potable')">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Agua Caliente -->
        <div class="col-md-6 mb-4">
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#modal-agua-caliente">
                    Agua Caliente
                </button>
                <span id="status-agua-caliente" class="badge bg-secondary">Pendiente</span>
            </div>
        </div>
        <div class="modal fade" id="modal-agua-caliente" tabindex="-1" aria-labelledby="modalLabel-agua-caliente" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel-agua-caliente">Formulario de Agua Caliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach (['Caldera 1', 'Caldera 2', 'Bomba de Flujo 1', 'Bomba de Flujo 2'] as $item)
                            <div class="mb-3">
                                <label for="{{ Str::slug($item, '_') }}" class="form-label">{{ $item }}</label>
                                <select name="{{ Str::slug($item, '_') }}" id="{{ Str::slug($item, '_') }}" class="form-select" required>
                                    <option value="encendido">Encendido</option>
                                    <option value="apagado">Apagado</option>
                                </select>
                            </div>
                        @endforeach
                        <button type="button" class="btn btn-success" onclick="saveStatus('agua-caliente')">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gases Medicinales -->
        <div class="col-md-6 mb-4">
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#modal-gases-medicinales">
                    Gases Medicinales
                </button>
                <span id="status-gases-medicinales" class="badge bg-secondary">Pendiente</span>
            </div>
        </div>
        <div class="modal fade" id="modal-gases-medicinales" tabindex="-1" aria-labelledby="modalLabel-gases-medicinales" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel-gases-medicinales">Formulario de Gases Medicinales</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach (['Compresora 1 de Aire Medicinal', 'Compresora 2 de Aire Medicinal', 'Secadora 1 de Aire Medicinal', 'Secadora 2 de Aire Medicinal'] as $item)
                            <div class="mb-3">
                                <label for="{{ Str::slug($item, '_') }}" class="form-label">{{ $item }}</label>
                                <select name="{{ Str::slug($item, '_') }}" id="{{ Str::slug($item, '_') }}" class="form-select" required>
                                    <option value="encendido">Encendido</option>
                                    <option value="apagado">Apagado</option>
                                </select>
                            </div>
                        @endforeach
                        <button type="button" class="btn btn-success" onclick="saveStatus('gases-medicinales')">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Eléctrico -->
        <div class="col-md-6 mb-4">
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#modal-electrico">
                    Eléctrico
                </button>
                <span id="status-electrico" class="badge bg-secondary">Pendiente</span>
            </div>
        </div>
        <div class="modal fade" id="modal-electrico" tabindex="-1" aria-labelledby="modalLabel-electrico" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel-electrico">Formulario de Eléctrico</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach (['Planta de Emergencia en Modo Auto', 'Revisión TAB-GN1', 'Revisión TAB-GN2', 'Paneles Solares'] as $item)
                            <div class="mb-3">
                                <label for="{{ Str::slug($item, '_') }}" class="form-label">{{ $item }}</label>
                                <select name="{{ Str::slug($item, '_') }}" id="{{ Str::slug($item, '_') }}" class="form-select" required>
                                    <option value="funcionando">Funcionando</option>
                                    <option value="revision">Revisión</option>
                                </select>
                            </div>
                        @endforeach
                        <button type="button" class="btn btn-success" onclick="saveStatus('electrico')">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aire Acondicionado -->
        <div class="col-md-6 mb-4">
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#modal-aire-acondicionado">
                    Aire Acondicionado
                </button>
                <span id="status-aire-acondicionado" class="badge bg-secondary">Pendiente</span>
            </div>
        </div>
        <div class="modal fade" id="modal-aire-acondicionado" tabindex="-1" aria-labelledby="modalLabel-aire-acondicionado" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel-aire-acondicionado">Formulario de Aire Acondicionado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="presion-bombas-chiller" class="form-label">Presión de Bombas de Chiller (PSI)</label>
                            <input type="number" name="presion_bombas_chiller" id="presion-bombas-chiller" class="form-control" min="0" required>
                        </div>
                        @foreach (['Bomba Chiller 1', 'Bomba Chiller 2', 'Bomba Chiller 3'] as $item)
                            <div class="mb-3">
                                <label for="{{ Str::slug($item, '_') }}" class="form-label">{{ $item }}</label>
                                <select name="{{ Str::slug($item, '_') }}" id="{{ Str::slug($item, '_') }}" class="form-select" required>
                                    <option value="funcionando">Funcionando</option>
                                    <option value="revision">Revisión</option>
                                </select>
                            </div>
                        @endforeach
                        <button type="button" class="btn btn-success" onclick="saveStatus('aire-acondicionado')">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contra Incendios -->
        <div class="col-md-6 mb-4">
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#modal-contra-incendios">
                    Contra Incendios
                </button>
                <span id="status-contra-incendios" class="badge bg-secondary">Pendiente</span>
            </div>
        </div>
        <div class="modal fade" id="modal-contra-incendios" tabindex="-1" aria-labelledby="modalLabel-contra-incendios" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel-contra-incendios">Formulario de Contra Incendios</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach (['Revisión Panel de Alarmas', 'Revisión Tablero Bombas Contra Incendios'] as $item)
                            <div class="mb-3">
                                <label for="{{ Str::slug($item, '_') }}" class="form-label">{{ $item }}</label>
                                <select name="{{ Str::slug($item, '_') }}" id="{{ Str::slug($item, '_') }}" class="form-select" required>
                                    <option value="sin_alarmas">Sin Alarmas</option>
                                    <option value="con_alarmas">Con Alarmas</option>
                                </select>
                            </div>
                        @endforeach
                        <button type="button" class="btn btn-success" onclick="saveStatus('contra-incendios')">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Observaciones y Nombre del Encargado -->
        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea id="observaciones" name="observaciones" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="nombre_encargado" class="form-label">Nombre del Encargado</label>
            <input type="text" id="nombre_encargado" name="nombre_encargado" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Finalizar recorrido</button>
    </form>
@endsection

@section('scripts')
    <script>
        // Confirmación antes de regresar
        function confirmBack() {
            if (confirm('Si regresas, perderás todos los datos llenados en el formulario. ¿Estás seguro?')) {
                window.location.href = "{{ route('tipo_recorrido') }}";
            }
        }

        // Función para guardar el estado de los formularios
        function saveStatus(id) {
            const badge = document.getElementById(`status-${id}`);
            badge.classList.remove('bg-secondary');
            badge.classList.add('bg-success');
            badge.innerText = 'Realizado';
            alertify.success(`Formulario de ${id.replace('-', ' ')} guardado`);
            const modal = bootstrap.Modal.getInstance(document.getElementById(`modal-${id}`));
            modal.hide();
        }
    </script>
@endsection
