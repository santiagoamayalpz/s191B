<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipo de Recorrido - ReInventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <h2>¿Qué tipo de recorrido deseas realizar?</h2>
        <a href="{{ route('formulario_recorrido', ['tipo' => 'diario']) }}" class="btn btn-primary mt-3">Recorrido Diario</a>
        <a href="{{ route('formulario_recorrido', ['tipo' => 'semanal']) }}" class="btn btn-primary mt-3">Recorrido Semanal</a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="resumenModal" tabindex="-1" aria-labelledby="resumenModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resumenModalLabel">Resumen del Recorrido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nombre del Encargado:</strong> {{ session('nombre_encargado') ?? 'N/A' }}</p>
                    <h6>Detalles del recorrido:</h6>
                    <ul>
                        <li><strong>Agua Potable:</strong> {{ session('resumen')['agua_potable'] ?? 'N/A' }}</li>
                        <li><strong>Agua Caliente:</strong> {{ session('resumen')['agua_caliente'] ?? 'N/A' }}</li>
                        <li><strong>Gases Medicinales:</strong> {{ session('resumen')['gases_medicinales'] ?? 'N/A' }}</li>
                        <li><strong>Eléctrico:</strong> {{ session('resumen')['electrico'] ?? 'N/A' }}</li>
                        <li><strong>Aire Acondicionado:</strong> {{ session('resumen')['aire_acondicionado'] ?? 'N/A' }}</li>
                        <li><strong>Sistema Contra Incendios:</strong> {{ session('resumen')['sistema_contra_incendios'] ?? 'N/A' }}</li>
                        <li><strong>Observaciones:</strong> {{ session('resumen')['observaciones'] ?? 'N/A' }}</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if(session('nombre_encargado'))
                var resumenModal = new bootstrap.Modal(document.getElementById('resumenModal'));
                resumenModal.show();
            @endif
        });
    </script>
</body>
</html>
