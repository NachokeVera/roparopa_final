<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Vestimenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    public function poleras()
    {
        $vestimentas = Vestimenta::where('categoria_id',1)->get();
        
        $detalleCarritos = null;

        if (Auth::check()) {
        // Obtener información adicional para usuarios autenticados
            $detalleCarritos = Auth::user()->detalleCarritos;
            
        }

        // Pasar la información a la vista
        return view('categorias.poleras-view', compact('vestimentas','detalleCarritos'));
    }
    public function cortavientos(){
        $vestimentas = Vestimenta::where('categoria_id',2)->get();
        
        $detalleCarritos = null;

        if (Auth::check()) {
        // Obtener información adicional para usuarios autenticados
            $detalleCarritos = Auth::user()->detalleCarritos;
            
        }

        // Pasar la información a la vista
        return view('categorias.cortavientos-view', compact('vestimentas','detalleCarritos'));
    }
}
