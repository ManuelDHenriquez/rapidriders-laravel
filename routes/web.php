<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\clienteController;
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


Route::get('/login', [loginController::class, 'index'])-> name('usuarios.login');

Route::post('/logIn', [loginController::class, 'logIn'])-> name('usuarios.logIn');

Route::get('/registroCliente', [clienteController::class, 'registrarCliente'])-> name('usuarios.registrarCliente');

Route::post('/storeCliente', [clienteController::class, 'storeCliente'])-> name('usuario.store');