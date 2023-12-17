<?php

namespace App\Http\Controllers;

use App\Models\Vestimenta;
use Illuminate\Http\Request;
use App\Http\Requests\VestimentaRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;
use App\Models\Talla;
use App\Models\DetalleVestimenta;
use App\Models\DetalleCarrito;
use Illuminate\Support\Facades\Auth;
use Database\Seeders\CategoriaSeeder;




class VestimentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vestimentas = Vestimenta::all();
        
        $detalleCarritos = null;

        if (Auth::check()) {
        // Obtener información adicional para usuarios autenticados
            $detalleCarritos = Auth::user()->detalleCarritos;
            
        }

        // Pasar la información a la vista
        return view('inicio', compact('vestimentas', 'detalleCarritos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $detalleCarritos = null;
      
        if (Auth::check()) {
        // Obtener información adicional para usuarios autenticados
            $detalleCarritos = Auth::user()->detalleCarritos;
            
        }

        $categorias = Categoria::all();
        return view('admin.form-vestimenta',compact('categorias', 'detalleCarritos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VestimentaRequest $request)
    {
        $imagenPath = $request->file('imagen')->store('public/storage/imagenes');
        $categoriaId = (int)$request->input('categoria');
        $tallas = Talla::all();

        $vestimenta = Vestimenta::create([
            'imagen' => $imagenPath,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'categoria_id' => $categoriaId
        ]);

        foreach ($tallas as $talla) {
            DetalleVestimenta::create([
                'vestimenta_id' => $vestimenta->id,
                'talla_id' => $talla->id,
                'cantidad' => 0,
            ]);
        }


        return redirect()->route('inicio');//->with('success', 'vestimenta agregada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    /* public function show(string $id)
    {
        $vestimenta = Vestimenta::find($id);
        $tallas = Talla::all();
        $detalleVestimentas = DetalleVestimenta::where('vestimenta_id',$id);
        $detalleCarritos = null;

        if (Auth::check()) {
        // Obtener información adicional para usuarios autenticados
            $detalleCarritos = Auth::user()->detalleCarritos;
            
        }

        return view('vestimenta_show', compact('vestimenta', 'tallas','detalleVestimentas','detalleCarritos'));
    } */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $vestimenta = Vestimenta::find($id);
        return view('admin.editar-vestimenta', compact('vestimenta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VestimentaRequest $request, string $id)
    {
        $vestimenta = vestimenta::find($id);

        if (!$vestimenta) {
            return redirect()->route('lista-vestimentas')->with('error', 'vestimenta no encontrada.');
        }

        // Actualizar los campos de la vestimenta
        $vestimenta->nombre = $request->nombre;
        $vestimenta->descripcion = $request->descripcion;
        $vestimenta->precio = $request->precio;

        // Actualizar la imagen si se proporciona una nueva
        if ($request->hasFile('imagen')) {
            // Lógica para manejar la imagen
            // Guardar la nueva imagen y actualizar el campo en la base de datos
            Storage::delete($vestimenta->imagen);
            //$imagen = $request->file('imagen');
            $vestimenta->imagen = $request->imagen->store('public/storage/imagenes');
        }

        // Guardar los cambios en la base de datos
        $vestimenta->save();

        return redirect()->route('admin.show.vestimenta')->with('success', 'vestimenta actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vestimenta = Vestimenta::find($id);
        $vestimenta->delete();
        return redirect()->route('admin.show.vestimenta');
    }

    /////////////////////

    public function mostrarLista(){
        $vestimentas = vestimenta::all();
        $detalleCarritos = null;

        if (Auth::check()) {
        // Obtener información adicional para usuarios autenticados
            $detalleCarritos = Auth::user()->detalleCarritos;
            
        }
        return view('admin.lista-prendas', compact('vestimentas','detalleCarritos'));
    }

    public function mostrarEditar($id){
        $vestimentas = vestimenta::find($id);
        $detalleCarritos = null;

        if (Auth::check()) {
        // Obtener información adicional para usuarios autenticados
            $detalleCarritos = Auth::user()->detalleCarritos;
            
        }
        return view('admin.editar-vestimenta', compact('vestimentas','detalleCarritos'));
    }
    // En tu controlador
    public function mostrarPrendas(Request $request)
    {
        
        $vestimentas = Vestimenta::all();
        $tallas = Talla::all();
        
        // Obtener el nombre de la prenda desde la solicitud
        $nombre_prenda = $request->input('nombre_prenda');
    
        // Aplicar el filtro si se proporciona un nombre de prenda
        if ($nombre_prenda) {
            $vestimentas = Vestimenta::where('nombre', $nombre_prenda)->get();
        }
    

    return view('inicio', compact('vestimentas', 'nombre_prenda','tallas'));
}

}

