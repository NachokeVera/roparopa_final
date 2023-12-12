<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VestimentaController;
use App\Http\Controllers\DetalleVestimentaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DetalleCarritoController;
use App\Models\DetalleCarrito;

// web.php






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//registro
/* Route::get('/pdf', [ProductoController::class, 'pdf'])->name('.pdf'); */

Route::get('/register', [RegisterController::class, 'show'])->name('show.register');
Route::post('/registro', [RegisterController::class, 'registrar'])->name('post.register');
//login
Route::get('/login', [LoginController::class, 'show'])->name('show.login');
Route::post('/login', [LoginController::class, 'login'])->name('post.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//prueba
Route::get('/test', [RegisterController::class, 'test'])->name('test.register');

Route::get('/', function () {return redirect()->route('vestimentas.index');})->name('inicio');

//vestimentas rutas
Route::get('/vestimentas',[VestimentaController::class,'index'])->name('vestimentas.index');
Route::get('/vestimentas/create',[VestimentaController::class,'create'])->name('vestimentas.create');
Route::post('/vestimentas',[VestimentaController::class,'store'])->name('vestimentas.store');
Route::get('/vestimentas/{id}/edit',[VestimentaController::class,'edit'])->name('vestimentas.edit');
Route::delete('/vestimentas/{id}',[VestimentaController::class,'destroy'])->name('vestimentas.destroy');
Route::put('/vestimentas/{id}',[VestimentaController::class,'update'])->name('vestimentas.update');
Route::get('/vestimentas/{id}',[VestimentaController::class,'show'])->name('vestimentas.show'); //Por terminar
//->middleware(['middleware_name'])->only(['create', 'edit']);



Route::get('/admin/vestimentas', [VestimentaController::class, 'mostrarLista'])->name('admin.show.vestimenta');
Route::get('/admin/vestimentas/{id}', [VestimentaController::class, 'mostrarEditar'])->name('admin.edit.vestimenta');
//Route::get('/admin/talla/{id}', [VestimentaController::class, 'talla'])->name('admin.talla.vestimenta');

Route::get('/detalles-vestimenta/talla/{id}',[DetalleVestimentaController::class, 'show'])->name('detalles_vestimentas.show');
Route::put('/detalles-vestimenta/{id}',[DetalleVestimentaController::class, 'update'])->name('detalles_vestimentas.update');

Route::post('/detalle-carritos',[DetalleCarritoController::class,'store'])->name('detalle_carritos.store');

Route::get('/mostrar-prendas', [VestimentaController::class, 'mostrarPrendas'])->name('filtrar-prenda');


Route::get('/compra-producto/{idProducto}', [ProductoController::class, 'mostrarCompraProducto'])->name('compra.producto');
Route::post('/realizar-compra/{id}.pdf', [ProductoController::class, 'realizarCompra'])->name('compra.pdf');


/*

Route::get('/', [PrendaController::class, 'inicioMostrar'])->name('inicio');
Route::get('/agregar-prenda', [PrendaController::class, 'agregarPrenda'])->name('agregar-prenda');
Route::post('/guardar-prenda', [PrendaController::class, 'guardarPrenda'])->name('guardar_prenda');
//Route::get('/lista-prendas', [PrendaController::class, 'mostrarLista'])->name('lista-prendas');

Route::post('/actualizar-prenda/{id}', [PrendaController::class, 'actualizar'])->name('actualizar-prenda');
Route::delete('/eliminar-prenda/{id}', [PrendaController::class, 'destroy'])->name('eliminar-prenda');



Route::get('/agregar-prenda', [PrendaController::class, 'agregarPrenda'])->name('agregar-prenda')->middleware('checkadmin');
Route::get('/lista-prendas', [PrendaController::class, 'mostrarLista'])->name('lista-prendas')->middleware('checkadmin');
Route::get('/acceso-denegado', [PrendaController::class, 'denegado'])->name('show.denegado');


*/