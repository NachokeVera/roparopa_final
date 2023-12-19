@extends('layouts.master')

@section('contenido-principal')

<div class="text-center mt-5">
    <h1>¡Gracias por tu compra!</h1>
    <p>Presionando aquí podrás descargar el PDF con el detalle de la boleta.</p>
    <a href="{{ route('ruta_para_descargar_pdf') }}" class="btn btn-primary">Descargar PDF</a>
</div>

@endsection