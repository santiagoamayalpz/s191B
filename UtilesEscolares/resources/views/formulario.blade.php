<!DOCTYPE html>
<html>
<head>
    <title>Útiles Escolares</title>
</head>
<body>
    <h1>Útiles Escolares</h1>

    <form action="/guardar-utiles" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label for="marca">Marca:</label>
        <input type="text" name="marca" required><br>
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" required><br>
        <button type="submit">Guardar Útiles</button>
    </form>
</body>
</html>
