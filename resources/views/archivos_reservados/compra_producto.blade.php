<!-- resources/views/compra_producto.blade.php -->
@extends('layouts.master')

@section('contenido-principal')
<h2>Detalles del Producto</h2>

<!-- Mostrar información del producto -->
<div class="col-md-4 mb-4">
    <div class="card">
        <div class="text-center">
            <img src="{{ Storage::url($vestimenta->imagen) }}" class="card-img-top mx-auto d-block" style="max-width: 450px; max-height: 450px;">
        </div>
        <div class="card-body text-center">
            <h5 class="card-title">{{ $vestimenta->nombre }}</h5>
            <p class="card-text">{{ $vestimenta->descripcion }}</p>
            <p class="card-text"><strong>Precio: ${{ $vestimenta->precio }}</strong></p>
            <p>{{ $talla }}</p>
        </div>
        
    </div>
</div>
<!-- Formulario de información personal -->
<form action="{{ route('compra.pdf', ['id' => $vestimenta->id]) }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="rut">RUT:</label>
        <input type="text" class="form-control" name="rut" id='rut' required>
    </div>

    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" name="nombre" required>
    </div>

    <div class="form-group">
        <label for="direccion">Dirección:</label>
        <input type="text" class="form-control" name="direccion" required>
    </div>

    <div class="form-group">
        <label for="telefono">Teléfono:</label>
        <input type="text" class="form-control" name="telefono" required>
    </div>

    <button type="submit" class="btn btn-primary">Comprar</button>
</form>

@endsection