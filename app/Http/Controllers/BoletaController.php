<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoletaController extends Controller
{
    public function show()
    {
        $detalleCarritos = null;

        if (Auth::check()) {
        // Obtener información adicional para usuarios autenticados
            $detalleCarritos = Auth::user()->detalleCarritos;
            
        }

        // Pasar la información a la vista
        return view('boleta_confirmada', compact('detalleCarritos'));
    }
}
