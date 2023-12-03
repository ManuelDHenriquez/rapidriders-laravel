<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\comercioController;
use App\Http\Controllers\motoristaController;
use App\Http\Controllers\productosController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Controladores de usuarios y clientes
Route::get('/login', [loginController::class, 'index'])-> name('usuarios.login');

Route::post('/logIn', [loginController::class, 'logIn'])-> name('usuarios.logIn');

Route::get('/registroCliente', [clienteController::class, 'registrarCliente'])-> name('clientes.registrarCliente');

Route::post('/storeCliente', [clienteController::class, 'storeCliente'])-> name('usuario.store');

Route::get('/clientes', [clienteController::class, 'cargarClientes'])-> name('clientes.clientes');

Route::get('/eliminar/cliente/{id}', [clienteController::class, 'eliminarCliente'])-> name('clientes.eliminar');

Route::delete('/clienteEliminar/{id}', [clienteController::class, 'clienteEliminar'])-> name('clientes.delete');

// Controladores de comercios
Route::get('/comercios', [comercioController::class, 'comercios'])-> name('comercios.comercios');

Route::get('/registrarComercio', [comercioController::class, 'registrarComercio'])-> name('comercios.registrarComercio');

Route::post('/comercioStore', [comercioController::class, 'comercioStore'])-> name('comercios.store');

Route::get('/eliminar/comercio/{id}', [comercioController::class, 'eliminarComercio'])-> name('comercios.eliminar');

Route::delete('/comercioEliminar/{id}', [comercioController::class, 'comercioEliminar'])-> name('comercios.delete');

Route::get('/comercios/{id}', [comercioController::class, 'comercio'])-> name('comercios.comercio');

// Controladores de Productos

Route::get('/productos', [productosController::class, 'productos'])-> name('productos.productos');

Route::get('/registrarProducto', [productosController::class, 'registrarProducto'])-> name('productos.registrarProducto');

Route::post('/productoStore', [productosController::class, 'productoStore'])-> name('productos.store');

Route::get('/eliminar/producto/{id}', [productosController::class, 'eliminarProducto'])-> name('productos.eliminar');

Route::delete('/productoEliminar/{id}', [productosController::class, 'productoEliminar'])-> name('productos.delete');


// Controladores de Motoristas

Route::get('/registroMotorista', [motoristaController::class, 'registrarMotorista'])-> name('usuarios.registrarMotorista');

Route::post('/storeMotorista', [motoristaController::class, 'storeMotorista'])-> name('usuario.storeMotorista');