
@extends('layouts.master')

@section('contenido-principal')
    <h2>Editar vestimenta de Ropa</h2>
    <form method="POST" action="{{ route('vestimentas.update', $vestimentas->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-2">
            <label for="imagen">Imagen:</label>
            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
        </div>
    
        <div class="form-group mb-2">
            <label for="nombre">Nombre:</label>
            <textarea class="form-control" id="nombre" name="nombre" rows="1">{{ $vestimentas->nombre }}</textarea>
        </div>
    
        <div class="form-group mb-2">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $vestimentas->descripcion }}</textarea>
        </div>
    
        <div class="form-group mb-2">
            <label for="precio">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" step="1" value="{{ $vestimentas->precio }}">
        </div>
    
        <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('¿Estás seguro de que deseas modificar esta vestimenta?')">Guardar</button>
    </form>
    
    
    
    
    

        
    
@endsection
