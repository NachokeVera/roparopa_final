<?php

namespace App\Http\Controllers;
use App\Models\Vestimenta;
use Illuminate\Http\Request;
use App\Http\Requests\VestimentaRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;
use App\Http\Requests\RegisterController;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use Carbon\Carbon;


class ProductoController extends Controller
{
    

public function mostrarCompraProducto(int $id, Request $request)
{
    $vestimenta = vestimenta::find($id);
    $talla=$request->talla;
    

    return view('compra_producto', compact('vestimenta', "talla"));
}






public function realizarCompra(Request $request, int $id)
{   $request->session()->put('datosCompra', $request->except('_token'));
    $vestimenta = Vestimenta::find($id);
   
    
    /* $cliente = User::where('rut', 'LIKE', '%' . $request->rut . '%')->get(); */
    $nombre = $request->nombre;
    $rut = $request->rut;
    $direccion = $request->direccion;
    $telefono = $request->telefono;
    $horaActual = Carbon::now();
    $datosCompra = session('datosCompra');

    
    
    
        // Lógica para procesar el formulario y generar la información

        
        $data = [
            'vestimenta' => $vestimenta,
            
            'horaActual'=>$horaActual, 
            
            
            
        ];

        // Generar el PDF
        $pdf = PDF::loadView('compra', $data ,['datosCompra' => $datosCompra]);
        return $pdf->stream();

        

        // Descargar el PDF
        /* return $pdf->download('compra'); */
    
}

}

