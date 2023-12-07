<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Css bootstrap --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Prueba</title>
</head>
<body>
    <div class="text-center">
        <h1>Confirmamos, Chaval?</h1>
        @if (Auth::check())
            <p>Usuario autenticado:</p>
            <ul>
                <li>RUT: {{ Auth::user()->rut }}</li>
            </ul>
        @else
            <p>No hay usuario autenticado.</p>
        @endif
    </div>
</body>
</html>