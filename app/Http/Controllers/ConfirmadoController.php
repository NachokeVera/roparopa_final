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
        $detalleCarritos = null;
        $usuario = Auth::user();

        if (Auth::check()) {
            $userID = Auth::user()->id;

            $detalleCarritos = DetalleCarrito::where('user_id', $userID)->whereDoesntHave('confirmados', function ($query) use ($userID) 
            {$query->where('user_id', $userID);})->get();
            
        }
         
        $clienteSnapshot = json_encode([
            'rut' => $usuario->rut,
            'nombre' => $usuario->nombre,
            'apellido'=> $usuario->apellido,
            'correo'=> $usuario->correo,
            'direccion'=> $usuario->direccion,
            'telefono'=> $usuario->telefono
        
        ]);
        
        $detalleVestimentasSnapshot = [];

        foreach ($detalleCarritos as $detalleCarrito) {
            $detalleVestimenta = $detalleCarrito->detalleVestimenta;
            $vestimenta = $detalleVestimenta->vestimenta;
            $talla = $detalleVestimenta->talla;

            $detalleVestimentasSnapshot[] = [
                'talla' => $talla->talla,
                'nombre' => $vestimenta->nombre,
                'precio' => $vestimenta->precio,
                'cantidad' => $detalleCarrito->cantidad_compras,
                'subtotal' => $detalleCarrito->cantidad_compras * $vestimenta->precio,
            ];
        }

        $boleta = Boleta::create([
            'fecha_venta' => now(),
            'total_venta' => $request->total,
            'cliente_snapshot' => $clienteSnapshot,
            'detalle_vestimentas_snapshot'=> json_encode($detalleVestimentasSnapshot)
        ]);

        foreach ($detalleCarritos as $detalleCarrito) {
            Confirmado::create([
                'boleta_id' => $boleta->id,
                'detalle_carrito_id' => $detalleCarrito->id,
            ]);
        }

        return redirect()->route('detalles_vestimentas.stock',['id' => $boleta->id]);//->method('put');
    }
    

}
