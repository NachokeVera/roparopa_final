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
                                <div class="mb-3">
                                    <p>Fecha de Compra: {{ $boleta->fecha_venta }}</p>
                                </div>
                                <ul class="list-group">
                                    @foreach ($detalleVestimentas[$boleta->id] as $detalleVestimenta)
                                    <li class="list-group-item">
                                        Talla: {{ $detalleVestimenta['talla'] }}
                                        <div></div>
                                        Vestimenta: {{ $detalleVestimenta['nombre'] }}
                                        <div></div>
                                        Precio: ${{ number_format($detalleVestimenta['precio'], 0, ',', '.') }}
                                        <div></div>
                                        Cantidad: {{ $detalleVestimenta['cantidad'] }}
                                        <div></div>
                                        Subtotal: ${{ number_format($detalleVestimenta['subtotal'], 0, ',', '.') }}
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