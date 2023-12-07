@extends('layouts.master')

@section("contenido-principal")
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">{{ $vestimenta->nombre }}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="rounded border p-2" style="width: 150px; height: 150px; overflow: hidden; margin: 0 auto;">
                                <img src="{{ Storage::url($vestimenta->imagen) }}" alt="{{ $vestimenta->nombre }}" class="img-fluid rounded" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <form method="post" action="{{ route('detalles_vestimentas.update', $vestimenta->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group mt-3">
                                    <label for="talla">Talla:</label>
                                    <select class="form-select" aria-label="Default select example" name="talla">
                                        <option selected>Selecciona la Talla</option>
                                        @foreach ($tallas as $talla)
                                            <option value="{{ $talla->id }}">{{ $talla->talla }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="precio">Cantidad:</label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" step="1">
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success">Sumar/Restar</button>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Talla</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($detallesVestimentas as $detalleVestimenta)
                    <tr>
                        <td scope="row">{{ $detalleVestimenta->talla->talla }}</td>
                        <td>{{ $detalleVestimenta->cantidad }}</td>
                        
                    </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

