<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ReInventario')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
</head>
<body>
    <header class="container mt-4">
        <h1 class="text-center">ReInventario</h1>
    </header>

    <div class="container mt-5">
        @yield('content')
    </div>

    <footer class="text-center mt-5">
        <p>&copy; 2024 ReInventario</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    
    @yield('scripts')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if(session('success'))
                alertify.success("{{ session('success') }}");
            @endif

            @if(session('error'))
                alertify.error("{{ session('error') }}");
            @endif
        });
    </script>
</body>
</html>

