@extends('layouts.master')

@section('contenido-principal')
    <title>Registrar</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center vh-100">
                <div class="card">
                    <div class="card-body">
                        <h2>Formulario de Registro</h2>
                        <form action="{{ route('post.register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="rut">Rut:</label>
                                <input type="text" class="form-control" id="rut" name="rut" placeholder="Ingrese su Rut">
                            </div>
                            @error('rut')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="correo">correo:</label>
                                <input type="correo" class="form-control" id="correo" name= "correo" placeholder="Ingrese su Correo">
                            </div>
                            @error('correo')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                           
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" class="form-control" id="password" name= "password" placeholder="Ingrese su Contraseña">
                            </div>
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"placeholder="Ingrese su Nombre">
                            </div>
                            @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="apellido">Apellido:</label>
                                <input type="text" class="form-control" id="apellido" name= "apellido" placeholder="Ingrese su Apellido">
                            </div>
                            @error('apellido')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                                <div class="form-group">
                                <label for="telefono">Telefono:</label>
                                <input type="telefono" class="form-control" id="telefono" name= "telefono" placeholder="Ingrese su Telefono">
                            </div>
                            @error('telefono')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="direccion">Direccion:</label>
                                <input type="direccion" class="form-control" id="direccion" name= "direccion" placeholder="Ingrese su Direccion">
                            </div>
                            @error('direccion')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection