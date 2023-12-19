@extends('layouts.master')

@section('contenido-principal')

<div class="container mt-5">
    <h1>Lista de Ventas</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID de Boleta</th>
                <th>Fecha de Compra</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($boletas as $boleta)
                <tr>
                    <td>{{ $boleta->id }}</td>
                    <td>{{ $boleta->fecha_venta }}</td>
                    <td>${{ number_format($boleta->total_venta, 0, ',', '.') }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#ModalImg{{ $boleta->id }}">
                            Ver más información
                        </button>
                        <a href="{{ route('boletas.pdf',$boleta->id) }}" class="btn btn-sm btn-success">Descargar PDF</a>
                    </td>
                </tr>
                <div class="modal fade" id="ModalImg{{ $boleta->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detalle de la compra</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">       
                                <!-- Información del Usuario -->
                                @php
                                    $usuario = $boleta->confirmados->first()->detalleCarrito->user;
                                @endphp
                                <div class="mb-3">
                                    <p>Fecha de Compra: {{ $boleta->fecha_venta }}</p>
                                </div>
                                <!-- Detalles de la Compra -->
                                <ul class="list-group">
                                    @foreach ($boleta->confirmados as $confirmado)
                                    @php
                                        $detalleCarrito = $confirmado->detalleCarrito;
                                        $detalleVestimenta = $detalleCarrito->detalleVestimenta;
                                    @endphp
                                    <li class="list-group-item">
                                        Talla: {{ $detalleVestimenta->talla->talla }}
                                        <div></div>
                                        Vestimenta: {{ $detalleVestimenta->vestimenta->nombre }}
                                        <div></div>
                                        Precio: ${{ number_format($detalleVestimenta->vestimenta->precio, 0, ',', '.') }}
                                        <div></div>
                                        Cantidad: {{ $detalleCarrito->cantidad_compras }}
                                        <div></div>
                                        Subtotal: ${{ number_format($detalleCarrito->cantidad_compras * $detalleVestimenta->vestimenta->precio,0, ',', '.') }}
                                    </li>
                                    @endforeach
                                </ul>
                                
                                <!-- Total de la Compra -->
                                <div class="mt-3">
                                    <p>Total de la Compra: ${{ number_format($boleta->total_venta,0, ',', '.') }}</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection