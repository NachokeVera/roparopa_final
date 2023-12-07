@extends('layouts.master')

@section('contenido-principal')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <!-- Mostrar la imagen de la vestimenta -->
            <img src="{{ Storage::url($vestimenta->imagen) }}" class="img-fluid" alt="{{ $vestimenta->nombre }}">
        </div>
        <div class="col-md-6">
            <!-- Mostrar detalles de la vestimenta -->
            <h3>{{ $vestimenta->nombre }}</h3>
            <p>{{ $vestimenta->descripcion }}</p>

            <!-- Formulario para agregar al carrito -->
            <form method="POST" action="{{ route('compra.producto', ['idProducto' => $vestimenta->id]) }}">
                @csrf
                <div class="form-group">
                    <label for="talla">Talla:</label>
                    <select class="form-select" aria-label="Selecciona la Talla" name="talla">
                        <option selected>Selecciona la Talla</option>
                        @foreach ($tallas as $talla)
                            <option value="{{ $talla->id }}">{{ $talla->talla }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" step="1" value="1">
                </div>

                <button type="submit" class="btn btn-success">Agregar al carrito</button>
            </form>
        </div>
    </div>
</div>
@endsection