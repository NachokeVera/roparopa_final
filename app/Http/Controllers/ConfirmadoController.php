<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
use App\Models\Confirmado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmadoController extends Controller
{
    public function store(Request $request)
    {
        $boleta = Boleta::create([
            'fecha_venta' => now(),
            'total_venta' => $request->total,
        ]);

        $detalleCarritos = null;

        if (Auth::check()) {
        // Obtener información adicional para usuarios autenticados
            $detalleCarritos = Auth::user()->detalleCarritos;
            
        }

        foreach ($detalleCarritos as $detalleCarrito) {
            Confirmado::create([
                'boleta_id' => $boleta->id,
                'detalle_carrito_id' => $detalleCarrito->id,
            ]);
        }

        return redirect()->route('vestimentas.stock');
    }
    

}
