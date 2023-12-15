
@extends('layouts.master')

@section('contenido-principal')
<h2>Lista de vestimentas de Ropa</h2>
<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
    
        @foreach($vestimentas as $vestimenta)
            <tr>
                <td>{{ $vestimenta->id}}</td>
                <td>
                    <img src="{{ Storage::url($vestimenta->imagen) }}" class="card-img-top" style="max-width: 150px; max-height: 150px;">
                </td>
                <td>{{ $vestimenta->nombre }}</td>
                <td>{{ $vestimenta->descripcion }}</td>
                <td>{{ $vestimenta->cantidad }}</td>
                <td>{{ $vestimenta->precio }}</td>
                <td>{{ $vestimenta->categoria->nombre }}</td>
                <td>
                    <a href="{{ route('detalles_vestimentas.edit', ['id' => $vestimenta->id]) }}" class="btn btn-sm btn-success">Talla</a>
                    <div class="my-1"></div>
                    <a href="{{ route('admin.edit.vestimenta', ['id' => $vestimenta->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                    <div class="my-1"></div>
                    <form action="{{ route('vestimentas.destroy', $vestimenta->id) }}" method="POST" style="display: inline;"> 
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta vestimenta?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
