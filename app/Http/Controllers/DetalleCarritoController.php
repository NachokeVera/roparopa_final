<?php

namespace App\Http\Controllers;

use App\Models\DetalleCarrito;
use App\Models\DetalleVestimenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetalleCarritoController extends Controller
{
    public function index()
    {
        $detalleCarritos = null;
        $total = 0;

        if (Auth::check()) {
            $detalleCarritos = Auth::user()->detalleCarritos;
        }
        foreach ($detalleCarritos as $detalleCarrito) {

            $precioUnitario = $detalleCarrito->detalleVestimenta->vestimenta->precio;
            $cantidad = $detalleCarrito->cantidad_compras;

            // Sumar al total
            $total += $precioUnitario * $cantidad;
        }

        return view('detalle-carrito-compras', compact('detalleCarritos','total'));
    }
    public function store(Request $request)
    {
        
        $user = Auth::user()->id;
        $detVestimenta = DetalleVestimenta::where('vestimenta_id',$request->vestimenta_id)->where('talla_id',$request->talla)->first();

        DetalleCarrito::create([
            'detalle_vestimenta_id' => $detVestimenta->id,
            'user_id' => $user,            
            'cantidad_compras' => $request->cantidad,
        ]);

        return redirect()->route('inicio');
    }
    public function destroy(string $id)
    {
        $det_carrito = DetalleCarrito::find($id);
        $det_carrito->delete();
        return redirect()->route('inicio');
    }
}
