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
        <h2>Información del Cliente</h2>
        <p><strong>RUT:</strong> {{ $usuario->rut}}</p>
        <p><strong>Nombre:</strong> {{ $usuario->nombre }} {{ $usuario->apellido }}</p>
        <p><strong>Correo:</strong> {{ $usuario->correo}}</p>
        <p><strong>Dirección:</strong> {{ $usuario->direccion }}</p>
        <p><strong>Teléfono:</strong> {{ $usuario->telefono }}</p>
        <p><strong>Hora de Compra:</strong> {{ $boleta->fecha_venta }}</p>
    </div>

    <div class="detalle-compra">
        <h2>Detalle Vestimenta</h2>
        @foreach ($boleta->confirmados as $confirmado)
        @php
            $detalleCarrito = $confirmado->detalleCarrito;
            $detalleVestimenta = $detalleCarrito->detalleVestimenta;
        @endphp
        <p><strong>Vestimenta:</strong> {{ $detalleVestimenta->vestimenta->nombre }}</p>
        <p><strong>Talla:</strong> {{ $detalleVestimenta->talla->talla }}</p>
        <p><strong>Precio:</strong> ${{ number_format($detalleVestimenta->vestimenta->precio, 0, ',', '.') }}</p>
        <p><strong>cantidad:</strong> {{ $detalleCarrito->cantidad_compras }}</p>
        <p><strong>cantidad:</strong> ${{ number_format($detalleCarrito->cantidad_compras * $detalleVestimenta->vestimenta->precio,0, ',', '.') }}</p>
        <hr>
        @endforeach
        
    </div>
    <div class="mt-3">
        <p>Total de la Compra: ${{ number_format($boleta->total_venta,0, ',', '.') }}</p>
    </div>
</body>
</html>
