@extends('layouts.master')

@section('contenido-principal')
<div class="d-flex justify-content-center">
    <h1 >BCDPKLN</h1>
</div>
<hr>
<div class="d-flex justify-content-center">
    <h5 >Prendas de vestir</h5>
</div>
<div class="container mt-4">
    {{-- <form method="GET" action="{{ route('filtrar-prenda') }}">
        <div class="form-group">
            <label for="nombre_prenda">Selecciona la vestimenta:</label>
            <select class="form-control" id="nombre_prenda" name="nombre_prenda">
                <option value="">Todas las vestimentas</option>
                @foreach ($vestimentas as $vestimenta)
                    <option value="{{ $vestimenta->nombre }}">{{ $vestimenta->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filtrar</button>
    </form> --}}
    <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb ">
        <ol class="breadcrumb d-flex justify-content-evenly">
            <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Todo</a></li>
            <li class="breadcrumb-item active" aria-current="page">Poleras</li>
            <li class="breadcrumb-item"><a href="{{ route('categorias.cortavientos') }}">Cortavientos</a></li>
            
        </ol>
    </nav>
    <div class="row">
    @foreach ($vestimentas as $vestimenta)
        <div class="col-md-4 mb-4">
                <div class="card p-3">
                    <div class="text-center">
                        <img src="{{ Storage::url($vestimenta->imagen) }}" class="card-img-top mx-auto d-block" style="max-width: 450px; max-height: 450px;">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $vestimenta->nombre }}</h5>
                        <p class="card-text">{{ $vestimenta->descripcion }}</p>
                        <p class="card-text"><strong>Precio: ${{ number_format($vestimenta->precio, 0, ',', '.') }}</strong></p>
                    </div>
                    <a href="{{ route('detalles_vestimentas.show',['id' => $vestimenta->id]) }}" class="btn btn-success">Elejir Tallaje</a>
                </div>
        </div>
    @endforeach
    </div>
</div>
@endsection

<!-- Agrega aquí el combo de tallas -->
                    {{-- <div class="form-group mt-3">
                        <label for="talla">Talla:</label>
                        <select class="form-select" aria-label="Default select example" name="talla">
                            <option selected>Selecciona la Talla</option>
                            @foreach ($tallas as $talla)
                                <option value="{{ $talla->id }}">{{ $talla->talla }}</option>
                            @endforeach
                        </select>
                    </div> --}}



