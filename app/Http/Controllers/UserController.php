<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DetalleCarrito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $usuario= User::find($id);
        
        $detalleCarritos = null;

        if (Auth::check()) {
            $userID = Auth::user()->id;

            $detalleCarritos = DetalleCarrito::where('user_id', $userID)->whereDoesntHave('confirmados', function ($query) use ($userID) 
            {$query->where('user_id', $userID);})->get();
            
        }

        // Pasar la información a la vista
        return view('auth.usuario', compact('usuario', 'detalleCarritos'));
    }
}
