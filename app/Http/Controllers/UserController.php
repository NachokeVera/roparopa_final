<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $usuario= User::find($id);
        
        $detalleCarritos = null;

        if (Auth::check()) {
        // Obtener información adicional para usuarios autenticados
            $detalleCarritos = Auth::user()->detalleCarritos;
            
        }

        // Pasar la información a la vista
        return view('auth.usuario', compact('usuario', 'detalleCarritos'));
    }
}
