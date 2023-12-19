<?php
namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Confirmado;
use Illuminate\Http\Request;
use App\Public\imagenes\File;
use Illuminate\Support\Facades\Storage;
use App\Models\DetalleVestimenta;
use App\Models\Talla;
use App\Models\Vestimenta;
use Illuminate\Support\Facades\Auth;
use App\Models\DetalleCarrito;

class DetalleVestimentaController extends Controller
{
    public function edit(string $id){
        $vestimenta = Vestimenta::find($id);
        $tallas = Talla::all();
        $detallesVestimentas = DetalleVestimenta::where('vestimenta_id', '=', $id)->get();
        $detalleCarritos = null;

        if (Auth::check()) {
            $userID = Auth::user()->id;

            $detalleCarritos = DetalleCarrito::where('user_id', $userID)->whereDoesntHave('confirmados', function ($query) use ($userID) 
            {$query->where('user_id', $userID);})->get();
            
        }

        return view('admin.detalle_vestimenta.det_vest_crear', compact('vestimenta','tallas','detallesVestimentas','detalleCarritos'));
    }
    public function update(Request $request,string $id){
        $detalleVestimenta = DetalleVestimenta::where('vestimenta_id', $id)->where('talla_id', $request->talla)->first();

        if (!$detalleVestimenta) {
            return redirect()->route('lista-vestimentas')->with('error', 'vestimenta no encontrada.');
        }
        $detalleVestimenta->cantidad += $request->cantidad;

        $detalleVestimenta->save();

        return redirect()->route('detalles_vestimentas.edit',$id);
    }

    public function show(string $id)
    {
        $tallas = Talla::all();
        $detalleVestimentas = DetalleVestimenta::where('vestimenta_id',$id)->get();
        $detalleCarritos = null;

        if (Auth::check()) {
            $userID = Auth::user()->id;

            $detalleCarritos = DetalleCarrito::where('user_id', $userID)->whereDoesntHave('confirmados', function ($query) use ($userID) 
            {$query->where('user_id', $userID);})->get();
            
        }

        return view('det_vestimenta_show', compact('tallas','detalleVestimentas','detalleCarritos'));
    }

    public function stock($id)
    {
        $confirmados = Confirmado::where('boleta_id',$id)->get();
        
        foreach ($confirmados as $confirmado) {
            $detalleVestimenta = DetalleVestimenta::find($confirmado->detalleCarrito->detalle_vestimenta_id);
            $detalleVestimenta->cantidad -= $confirmado->detalleCarrito->cantidad_compras;
            $detalleVestimenta->save();
        }
        
        return redirect()->route('boletas.confirmada');
    }
}
