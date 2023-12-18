@extends('layouts.master')

@section('contenido-principal')
<div class="container mt-4">
    <div class="row">
        <!-- Detalle de los artículos en el carrito -->
        <div class="col-md-9">
            <div class="card p-3">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Talla</th>
                        <th scope="col">Vestimenta</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio unitario</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if ($detalleCarritos != null)
                        @foreach ($detalleCarritos as $detalleCarrito)
                          <tr>
                            <td>{{ $detalleCarrito->detalleVestimenta->talla->talla }}</td>
                            <td>{{ $detalleCarrito->detalleVestimenta->vestimenta->nombre }}</td>
                            <td>{{ $detalleCarrito->cantidad_compras }}</td>
                            <td>${{ number_format($detalleCarrito->detalleVestimenta->vestimenta->precio, 0, ',', '.') }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#ModalImg{{ $detalleCarrito->id }}">
                                    Ver
                                </button>
                                <form action="{{ route('detalle_carritos.destroy', $detalleCarrito->id) }}" method="POST" style="display: inline;"> 
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta vestimenta?')">Eliminar</button>
                                </form>
                            </td>
                          </tr>
                          <div class="modal fade" id="ModalImg{{ $detalleCarrito->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Vestimenta: {{ $detalleCarrito->detalleVestimenta->vestimenta->nombre }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ Storage::url($detalleCarrito->detalleVestimenta->vestimenta->imagen) }}" alt="Imagen de la vestimenta" class="img-fluid">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      @else
                        <h6>No hay elementos en el carrito</h6>
                      @endif
                      
                    </tbody>
                  </table>
            </div>
        </div>

        <!-- Resumen de precios y botón para comprar -->
        <div class="col-md-3">
            <div class="card p-3">
                <table class="table">
                    <thead>
                      <tr>
                        <th>Resumen de precios</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @if ($detalleCarritos != null)
                        @foreach ($detalleCarritos as $detalleCarrito)
                          <tr >
                            <td class="text-right">${{ number_format(($detalleCarrito->detalleVestimenta->vestimenta->precio * $detalleCarrito->cantidad_compras), 0, ',', '.') }}</td>
                            <td><a href="" class="btn btn-sm" style="color: white" >a</a></td>
                          </tr>
                        @endforeach                      
                      @endif                      
                    </tbody>
                </table>
                <form method="POST" action="{{ route('confirmados.store') }}">
                  @csrf
                  <label for="">Total a pagar: ${{ number_format(($total),0,',','.') }}</label>
                  <input type="hidden" value="{{ $total }}" name="total">
                  <div class="mb-4"></div>
                  <label for="pagoMet" >Metodo de pago:</label>
                  <select id= "pagoMet"class="form-select" aria-label="Default select example">
                      <option selected>Seleccione metodo de pago</option>
                      <option value="1">Tarjeta Debito/Credito</option>
                      <option value="2">Efectivo</option>
                  </select>
                  <hr>
                  <button type="submit" class="btn btn-success">Confirmar Compra</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


