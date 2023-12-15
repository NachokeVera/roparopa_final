@extends('layouts.master')

@section('contenido-principal')
<div class="container mt-4">
    <div class="row">
        <!-- Detalle de los artículos en el carrito -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detalle del Carrito</h5>
                    <ul class="list-group">
                        @foreach ($detalleCarritos as $detalleCarrito)
                            <li class="list-group-item">
                                {{ $detalleCarrito->detalleVestimenta->vestimenta->nombre }} - Talla: {{ $detalleCarrito->detalleVestimenta->talla->talla }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Resumen de precios y botón para comprar -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Resumen de Precios</h5>
                    <ul class="list-group">
                        @foreach ($detalleCarritos as $detalleCarrito)
                            <li class="list-group-item">
                                {{ $detalleCarrito->detalleVestimenta->vestimenta->nombre }} - Precio: ${{ $detalleCarrito->detalleVestimenta->vestimenta->precio }}
                            </li>
                        @endforeach
                    </ul>
                    <p class="card-text">Total: $</p>
                    <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-success">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


