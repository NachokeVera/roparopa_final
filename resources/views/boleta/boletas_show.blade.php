@extends('layouts.master')

@section('contenido-principal')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <!-- Información del Usuario -->
            <div class="mb-3">
                <p>Fecha de Compra: {{ $fechaCompra }}</p>
                <p>cliente: {{ $nombre }} {{ $apellido }}</p>
                <p>Correo Electrónico: {{ $correo }}</p>
                <p>Dirección: {{ $direccion }}</p>
                <p>Número de Teléfono: {{ $telefono }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Detalles de la Compra -->
            <ul class="list-group">
                @foreach ($detallesCompra as $detalle)
                    <li class="list-group-item">
                        Talla: {{ $detalle->talla }}
                        Vestimenta: {{ $detalle->nombreVestimenta }}
                        Precio: ${{ $detalle->precio }}
                        Cantidad: {{ $detalle->cantidad }}
                        Subtotal: ${{ $detalle->subtotal }}
                    </li>
                @endforeach
            </ul>

            <!-- Total de la Compra -->
            <div class="mt-3">
                <p>Total de la Compra: ${{ $totalCompra }}</p>
            </div>
        </div>
    </div>
</div>


@endsection