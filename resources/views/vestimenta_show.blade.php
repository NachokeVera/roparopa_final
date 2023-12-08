@extends('layouts.master')

@section('contenido-principal')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ Storage::url($vestimenta->imagen) }}" class="card-img-top mx-auto d-block" style="max-width: 100%; height: auto;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $vestimenta->nombre }}</h5>
                        <p class="card-text">{{ $vestimenta->descripcion }}</p>
                        <p class="card-text"><strong>Precio: ${{ $vestimenta->precio }}</strong></p>

                        <form method="POST" action="{{ route('compra.producto', ['idProducto' => $vestimenta->id]) }}">
                            @csrf
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
                                <button type="submit" class="btn btn-success">Agregar al carrito</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection