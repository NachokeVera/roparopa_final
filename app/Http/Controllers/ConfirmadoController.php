<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
use App\Models\Confirmado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DetalleCarrito;

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
            $userID = Auth::user()->id;

            $detalleCarritos = DetalleCarrito::where('user_id', $userID)->whereDoesntHave('confirmados', function ($query) use ($userID) 
            {$query->where('user_id', $userID);})->get();
            
        }

        foreach ($detalleCarritos as $detalleCarrito) {
            Confirmado::create([
                'boleta_id' => $boleta->id,
                'detalle_carrito_id' => $detalleCarrito->id,
            ]);
        }

        return redirect()->route('detalles_vestimentas.stock',['id' => $boleta->id]);//->method('put');
    }
    

}
