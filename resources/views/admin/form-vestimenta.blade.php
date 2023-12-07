@extends('layouts.master')

@section("contenido-principal")
 
<div class="container mt-5">
  <div class="row justify-content-center">
      <div class="col-md-6">
          <div class="card">
              <div class="card-header bg-primary text-white">
                  <h2 class="mb-0">Agregar vestimenta de Ropa</h2>
              </div>
              <div class="card-body">
                  <form method="post" action="{{ route('vestimentas.store') }}" enctype="multipart/form-data">
                      @csrf

                            <div class="form-group">
                                <label for="imagen">Foto:</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                            </div>
                            <div class="form-group">
                              <label for="nombre">Nombre:</label>
                              <textarea class="form-control" id="nombre" name="nombre" rows="1"></textarea>
                          </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                            </div>
                             
                            <div class="form-group">
                                <label for="precio">Precio:</label>
                                <input type="number" class="form-control" id="precio" name="precio" step="1">
                            </div>

                            <div class="form-group">
                                <label for="categoria">Categoria:</label>
                                <select class="form-select" aria-label="Default select example" name="categoria">
                                    <option selected>Selecciona la Categoria</option>
                                    @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- 
                            <div class="form-group">
                                <label for="cantidad">Cantidad:</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad">
                            </div>

                            
                            <div class="form-group">
                                <label for="tallaje">Tallaje:</label>
                                <input type="text" class="form-control" id="tallaje" name="tallaje">
                            </div> 
                            --}}

                            <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

