@extends('layouts.master')

@section('contenido-principal')

<h2>Perfil de Usuario</h2>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Información Personal</h5>
            <ul class="list-group">
                <li class="list-group-item"><strong>RUT:</strong> {{ $usuario->rut }}</li>
                <li class="list-group-item"><strong>Nombre:</strong> {{ $usuario->nombre }} {{ $usuario->apellido }}</li>
                <li class="list-group-item"><strong>Correo:</strong> {{ $usuario->correo }}</li>
                <li class="list-group-item"><strong>Dirección:</strong> {{ $usuario->direccion }}</li>
                <li class="list-group-item"><strong>Teléfono:</strong> {{ $usuario->telefono }}</li>
            </ul>
        </div>
    </div>

@endsection