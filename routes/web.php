<?php

use App\Http\Controllers\BoletaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VestimentaController;
use App\Http\Controllers\DetalleVestimentaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ConfirmadoController;
use App\Http\Controllers\DetalleCarritoController;
use App\Http\Controllers\UserController;

// web.php
/* Route::get('/pdf', [ProductoController::class, 'pdf'])->name('.pdf'); */

//registro
Route::get('/register', [RegisterController::class, 'show'])->name('show.register');
Route::post('/registro', [RegisterController::class, 'registrar'])->name('post.register');
//login
Route::get('/login', [LoginController::class, 'show'])->name('show.login');
Route::post('/login', [LoginController::class, 'login'])->name('post.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//usuario
Route::get('/usuario/{id}',[UserController::class, 'show'])->name('user.show');//->middleware('checkusuario');
//prueba
Route::get('/acceso-denegado',function (){return view('acceso-denegado');})->name('acceso.denegado');
Route::get('/test', [RegisterController::class, 'test'])->name('test.register');

Route::get('/', function () {return redirect()->route('vestimentas.index');})->name('inicio');

//vestimentas rutas
Route::get('/vestimentas',[VestimentaController::class,'index'])->name('vestimentas.index');

Route::get('/vestimentas/create',[VestimentaController::class,'create'])->name('vestimentas.create')->middleware('checkadmin');
Route::post('/vestimentas',[VestimentaController::class,'store'])->name('vestimentas.store')->middleware('checkadmin');
Route::delete('/vestimentas/{id}',[VestimentaController::class,'destroy'])->name('vestimentas.destroy')->middleware('checkadmin');
Route::put('/vestimentas/{id}',[VestimentaController::class,'update'])->name('vestimentas.update')->middleware('checkadmin');
Route::get('/admin/vestimentas', [VestimentaController::class, 'mostrarLista'])->name('admin.show.vestimenta')->middleware('checkadmin');
Route::get('/admin/vestimentas/{id}', [VestimentaController::class, 'mostrarEditar'])->name('admin.edit.vestimenta')->middleware('checkadmin');

Route::get('/categorias/poleras',[CategoriaController::class,'poleras'])->name('categorias.poleras');
Route::get('/categorias/cortavientos',[CategoriaController::class,'cortavientos'])->name('categorias.cortavientos');

//Route::get('/admin/talla/{id}', [VestimentaController::class, 'talla'])->name('admin.talla.vestimenta');

Route::get('/detalles-vestimenta/talla/{id}',[DetalleVestimentaController::class, 'edit'])->name('detalles_vestimentas.edit')->middleware('checkadmin');
Route::put('/detalles-vestimenta/{id}',[DetalleVestimentaController::class, 'update'])->name('detalles_vestimentas.update')->middleware('checkadmin');
Route::get('/detalles-vestimenta/{id}',[DetalleVestimentaController::class,'show'])->name('detalles_vestimentas.show');
Route::match(['get', 'put'],'/detalles-vestimenta/stock/{id}',[DetalleVestimentaController::class,'stock'])->name('detalles_vestimentas.stock');


Route::post('/detalle-carritos',[DetalleCarritoController::class,'store'])->name('detalle_carritos.store');
Route::get('/detalle-carritos',[DetalleCarritoController::class,'index'])->name('detalle_carritos.index');
Route::delete('/detalle-carritos/{id}',[DetalleCarritoController::class,'destroy'])->name('detalle_carritos.destroy');

Route::post('/confirmados',[ConfirmadoController::class,'store'])->name('confirmados.store');
Route::get('/boletas/confirmado/{id}',[BoletaController::class,'confirmada'])->name('boletas.confirmada');
Route::get('/boletas',[BoletaController::class,'index'])->name('boletas.index')->middleware('checkadmin');
Route::get('/boleta/{id}', [BoletaController::class, 'show'])->name('boletas.show');
Route::get('/boleta/{id}/descargarpdf', [BoletaController::class, 'pdf'])->name('boletas.pdf');



Route::get('/mostrar-prendas', [VestimentaController::class, 'mostrarPrendas'])->name('filtrar-prenda');

Route::get('/compra-producto/{idProducto}', [ProductoController::class, 'mostrarCompraProducto'])->name('compra.producto');



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