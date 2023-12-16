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
                                <select class="form-select" aria-label="Default select example" name="talla">
                                    <option selected>Selecciona la Talla</option>
                                    @foreach ($tallas as $talla)
                                        <option value="{{ $talla->id }}">{{ $talla->talla }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="cantidad">Cantidad:</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" step="1" required>
                            </div>
                            <p id="stock-disponible">stock disponible: 15</p>

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
    
@endsection
