<?php
namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Public\imagenes\File;
use Illuminate\Support\Facades\Storage;
use App\Models\DetalleVestimenta;
use App\Models\Talla;
use App\Models\Vestimenta;
use Database\Seeders\CategoriaSeeder;

class DetalleVestimentaController extends Controller
{
   /*  public function mostrarFormulario()
    {
        return view('vestimentas.formulario');
    }
            
     */
    public function agregarvestimenta(){
        return view('admin.form-vestimenta');
    }
    public function inicio(){
        return view('inicio');
    }

    public function guardarvestimenta(Request $request){
        $request->validate([
            'imagen' => 'required|image',
            'nombre' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required|integer',
            'tallaje' => 'required',
            'precio' => 'required|integer',
            
        ]);

        $imagenPath = $request->file('imagen')->store('public/storage/imagenes');

        DetalleVestimenta::create([
            'imagen' => $imagenPath,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'tallaje' => $request->tallaje,
            'precio' => $request->precio,
            
        ]);

        return redirect()->route('inicio')->with('success', 'vestimenta agregada exitosamente.');
    }
    public function inicioMostrar(){
        $vestimentas = DetalleVestimenta::all(); // o cualquier consulta para obtener las vestimentas
        return view('inicio', compact('vestimentas'));
    }


    public function mostrarEditar($id){
        $vestimenta = vestimenta::find($id);
        return view('admin.editar-vestimenta', compact('vestimenta'));
    }
    public function actualizar(Request $request, $id){
        $request->validate([
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nombre' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'tallaje' => 'required',
        ]);

        $vestimenta = vestimenta::find($id);

        if (!$vestimenta) {
            return redirect()->route('lista-vestimentas')->with('error', 'vestimenta no encontrada.');
        }

        // Actualizar los campos de la vestimenta
        $vestimenta->nombre = $request->nombre;
        $vestimenta->descripcion = $request->descripcion;
        $vestimenta->cantidad = $request->cantidad;
        $vestimenta->precio = $request->precio;
        $vestimenta->tallaje = $request->tallaje;

        // Actualizar la imagen si se proporciona una nueva
        if ($request->hasFile('imagen')) {
            // Lógica para manejar la imagen
            // Guardar la nueva imagen y actualizar el campo en la base de datos
            Storage::delete($vestimenta->imagen);
            $imagen = $request->file('imagen');
            $vestimenta->imagen = $request->imagen->store('public/storage/imagenes');
        }

        // Guardar los cambios en la base de datos
        $vestimenta->save();

        return redirect()->route('lista-vestimentas')->with('success', 'vestimenta actualizada exitosamente.');
    }

    public function destroy($id){
        
        $vestimenta = vestimenta::find($id);
        $vestimenta->delete();
        return redirect()->route('lista-vestimentas');
    }
    public function denegado(){
        return view('acceso-denegado');
    }


    ////////////////////////////////////////////////////////////////////

    public function index(){
        
    }
    public function show(string $id){
        $vestimenta = Vestimenta::find($id);
        $tallas = Talla::all();
        $detallesVestimentas = DetalleVestimenta::where('vestimenta_id', '=', $id)->get();
        return view('admin.detalle_vestimenta.det_vest_crear', compact('vestimenta','tallas','detallesVestimentas'));
    }
    public function update(Request $request,string $id){
        $detalleVestimenta = DetalleVestimenta::where('vestimenta_id', $id)->where('talla_id', $request->talla)->first();

        if (!$detalleVestimenta) {
            return redirect()->route('lista-vestimentas')->with('error', 'vestimenta no encontrada.');
        }
        $detalleVestimenta->cantidad += $request->cantidad;

        $detalleVestimenta->save();

        return redirect()->route('detalles_vestimentas.show',$id);
    }
    public function store(Request $request){

    }
    public function create(){

    }
}
