<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Compra</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1, h2 {
            color: #333;
        }

        p {
            margin: 5px 0;
        }

        .detalle-compra {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Tienda BCDPKLK</h1>
    <h1>Boleta de Compra</h1>

    <div class="detalle-compra">
        <h2>Vestimenta</h2>
        <p><strong>Nombre:</strong> {{ $vestimenta->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $vestimenta->descripcion }}</p>
        <p><strong>Precio:</strong> ${{ $vestimenta->precio }}</p>
    </div>

    <div class="detalle-compra">
        <h2>Información del Cliente</h2>
        <p><strong>RUT:</strong> {{ $datosCompra['rut'] }}</p>
        <p><strong>Nombre:</strong> {{ $datosCompra['nombre'] }}</p>
        <p><strong>Dirección:</strong> {{ $datosCompra['direccion'] }}</p>
        <p><strong>Teléfono:</strong> {{ $datosCompra['telefono'] }}</p>
        <p><strong>Hora de Compra:</strong> {{ $horaActual->format('H:i:s') }}</p>
    </div>
</body>
</html>
