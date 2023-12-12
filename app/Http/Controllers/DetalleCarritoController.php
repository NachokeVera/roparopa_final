<?php

namespace App\Http\Controllers;

use App\Models\DetalleCarrito;
use App\Models\DetalleVestimenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetalleCarritoController extends Controller
{
    public function store(Request $request)
    {
        
        $user = Auth::user()->id;
        $detVestimenta = DetalleVestimenta::where('vestimenta_id',$request->vestimentaId)->where('talla_id',$request->talla)->first();
        $cantidad = $request->cantidad;

        $detalleCarrito = DetalleCarrito::create([
            'detalle_vestimenta_id' => $detVestimenta->id,
            'user_id' => $user,            
            'cantidad' => $cantidad,
        ]);

        return redirect()->route('inicio');//->with('success', 'vestimenta agregada exitosamente.');
    }
}
