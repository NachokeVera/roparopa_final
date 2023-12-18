
@extends('layouts.master')

@section('contenido-principal')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Editar vestimenta de Ropa</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('vestimentas.update', $vestimentas->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-2">
                            <label for="imagen">Imagen:</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                        </div>
                        @error('imagen')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-group mb-2">
                            <label for="nombre">Nombre:</label>
                            <textarea class="form-control" id="nombre" name="nombre" rows="1">{{ $vestimentas->nombre }}</textarea>
                        </div>
                        @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-group mb-2">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $vestimentas->descripcion }}</textarea>
                        </div>
                        @error('descripcion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-group mb-2">
                            <label for="precio">Precio:</label>
                            <input type="number" class="form-control" id="precio" name="precio" step="1" value="{{ $vestimentas->precio }}">
                        </div>
                        @error('precio')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-group mb-2">
                            <label for="categoria">Categoría:</label>
                            <select class="form-control" id="categoria" name="categoria">
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ $vestimentas->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('¿Estás seguro de que deseas modificar esta vestimenta?')">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Imagen</h3>
                </div>
                <div class="card-body p-2">
                    <img src="{{ Storage::url($vestimentas->imagen) }}" alt="Imagen de la vestimenta" class="card-img-top">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
