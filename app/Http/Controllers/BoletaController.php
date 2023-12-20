<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DetalleCarrito;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;

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

        $clientes = [];
        $detalleVestimentas = [];

        foreach ($boletas as $boleta) {
            $cliente = json_decode($boleta->cliente_snapshot, true);
            $clientes[$boleta->id] = $cliente;

            $detalleVestimenta = json_decode($boleta->detalle_vestimentas_snapshot, true);
            $detalleVestimentas[$boleta->id] = $detalleVestimenta;
        }


        return view('boleta.boleta_index', compact('detalleCarritos', 'boletas', 'clientes', 'detalleVestimentas'));
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
    
    public function usuario($id)
    {
        $usuario = User::findOrFail($id);
        $boletas = Boleta::whereHas('confirmados.detalleCarrito', function ($query) use ($usuario) {
            $query->where('user_id', $usuario->id);
        })
        ->get();

        $detalleCarritos = null;
        if (Auth::check()) {
            $userID = Auth::user()->id;
            $detalleCarritos = DetalleCarrito::where('user_id', $userID)->whereDoesntHave('confirmados', function ($query) use ($userID) 
            {$query->where('user_id', $userID);})->get();
        }

        $detalleVestimentas = [];

        foreach ($boletas as $boleta) {
            $detalleVestimenta = json_decode($boleta->detalle_vestimentas_snapshot, true);
            $detalleVestimentas[$boleta->id] = $detalleVestimenta;
        }
        
        return view('boleta.boleta_index_user', compact('detalleCarritos','boletas','detalleVestimentas'));
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
