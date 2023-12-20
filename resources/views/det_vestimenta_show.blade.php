@extends('layouts.master')

@section('contenido-principal')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <img src="{{ Storage::url($detalleVestimentas[0]->vestimenta->imagen) }}" class="card-img-top mx-auto d-block" style="max-width: 100%; height: auto;">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $detalleVestimentas[0]->vestimenta->nombre }}</h5>
                    <p class="card-text">{{ $detalleVestimentas[0]->vestimenta->descripcion }}</p>
                    <p class="card-text"><strong>Precio: ${{ $detalleVestimentas[0]->vestimenta->precio }}</strong></p>

                    <form method="POST" action="{{ route('detalle_carritos.store') }}">
                        @csrf
                        <input type="hidden" value="{{ $detalleVestimentas[0]->vestimenta_id }}" name="vestimenta_id">
                        <div class="form-group">
                            <label for="talla">Talla:</label>
                            <select class="form-select" aria-label="Default select example" name="talla" id="tallaSelect">
                                <option value="" selected>Selecciona la Talla</option>
                                @foreach ($tallas as $talla)
                                    <option value="{{ $talla->id }}">{{ $talla->talla }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="cantidad">Cantidad:</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" step="1" required onchange="validarCantidad()">
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Talla</th>
                                    <th>Cantidad Máxima</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detalleVestimentas as $detalleVestimenta)
                                    <tr>
                                        <td>{{ $detalleVestimenta->talla->talla }}</td>
                                        <td>{{ $detalleVestimenta->cantidad }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <p id="mensaje-error-talla" style="color: red; display: none;">Selecciona una talla antes de agregar al carrito.</p>
                        <p id="mensaje-error-cantidad" style="color: red; display: none;"></p>

                        <div class="d-flex justify-content-end">
                            @auth
                            <button type="submit" class="btn btn-success">Agregar al carrito</button>
                            @endauth
                            @guest
                            <button type="submit" class="btn btn-success " disabled>Agregar al carrito</button>
                            @endguest
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validarCantidad() {
        var cantidadInput = document.getElementById('cantidad');
        var tallaSelect = document.getElementById('tallaSelect');
        var cantidadMaxima = {{ $detalleVestimentas[0]->cantidad }}; // Obtén la cantidad máxima desde el servidor
        var mensajeErrorTalla = document.getElementById('mensaje-error-talla');
        var mensajeErrorCantidad = document.getElementById('mensaje-error-cantidad');

        if (tallaSelect.value === "") {
            // No se ha seleccionado una talla
            mensajeErrorTalla.style.display = 'block';
            mensajeErrorCantidad.style.display = 'none';
            return;
        } else {
            mensajeErrorTalla.style.display = 'none';
        }

        if (parseInt(cantidadInput.value) > cantidadMaxima) {
            // La cantidad ingresada supera el stock disponible
            cantidadInput.value = cantidadMaxima;
            mensajeErrorCantidad.innerHTML = 'La Talla no puede superar la cantidad máxima: ' + cantidadMaxima;
            mensajeErrorCantidad.style.display = 'block';
        } else {
            mensajeErrorCantidad.style.display = 'none';
        }
    }
</script>
@endsection