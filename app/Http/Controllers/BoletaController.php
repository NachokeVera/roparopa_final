<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DetalleCarrito;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function confirmada($id)
    {
        $boletaId = $id;
        $detalleCarritos = null;
        if (Auth::check()) {
            $userID = Auth::user()->id;
            $detalleCarritos = DetalleCarrito::where('user_id', $userID)->whereDoesntHave('confirmados', function ($query) use ($userID) 
            {$query->where('user_id', $userID);})->get();
        }

        // Pasar la información a la vista
        return view('boleta.boleta_confirmada', compact('detalleCarritos','boletaId'));
    }
    
    public function indexUser()
    {
        
    }

    public function show($id)
    {

    }
    public function pdf($id)
    {
        
        $boleta=Boleta::find($id);
        $usuario = $boleta->confirmados->first()->detalleCarrito->user;
        
        $data = [
            'boleta' => $boleta,
            'usuario'=>$usuario, 
        ];
        // Generar el PDF
        $pdf = PDF::loadView('boleta.boleta_pdf', $data);
        return $pdf->download('boleta.pdf');
    

    }
}
