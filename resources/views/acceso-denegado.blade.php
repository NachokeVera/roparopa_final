<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Css bootstrap --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Denegado</title>
</head>
<body>
    <div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div>
            <h1 class="text-center">No tienes permiso a esa ruta</h1>
            <a href="#">Volver al inicio</a>
        </div>
    </div>
</body>
</html>