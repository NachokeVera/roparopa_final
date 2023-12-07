<?php

namespace App\Http\Controllers;

use App\Models\DetalleVestimenta;
use Illuminate\Http\Request; 
use App\Public\imagenes\File;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //PRUEBA PRUEBA PRUEBA
    public function ShowForm(){
        return view('agregar-vestimenta');
    }
    public function mostrarLista(){
    $vestimentas = DetalleVestimenta::all();
    return view('admin.lista-vestimentas', compact('vestimentas'));
    }

}
