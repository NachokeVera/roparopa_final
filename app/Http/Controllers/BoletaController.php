<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DetalleCarrito;

class BoletaController extends Controller
{
    public function index()
    {
        $boletas = Boleta::all();

        $detalleCarritos = null;
        if (Auth::check()) {
            $userID = Auth::user()->id;
            $detalleCarritos = DetalleCarrito::where('user_id', $userID)->whereDoesntHave('confirmados', function ($query) use ($userID) 
            {$query->where('user_id', $userID);})->get();
        }
        return view('boleta.boleta_index', compact('detalleCarritos','boletas'));
    }

    public function confirmada()
    {
        $detalleCarritos = null;
        if (Auth::check()) {
            $userID = Auth::user()->id;
            $detalleCarritos = DetalleCarrito::where('user_id', $userID)->whereDoesntHave('confirmados', function ($query) use ($userID) 
            {$query->where('user_id', $userID);})->get();
        }

        // Pasar la información a la vista
        return view('boleta.boleta_confirmada', compact('detalleCarritos'));
    }
    
    public function indexUser()
    {
        
    }

    public function show($id)
    {

    }
}
