@extends('layouts.master')

@section('contenido-principal')

<div class="text-center mt-5">
    <h1>¡Gracias por tu compra!</h1>
    <p>Presionando aquí podrás descargar el PDF con el detalle de la boleta.</p>
    <a href="{{ route('boletas.pdf',$boletaId) }}" class="btn btn-success">Descargar PDF</a>
    
    
</div>

@endsection