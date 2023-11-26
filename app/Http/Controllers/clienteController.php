<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cliente {
    public $nombre;
    public $apellido;
    public $usuario;
    public $password;
    public $direccion;
}

class clienteController extends Controller
{
    //
    public function registrarCliente () {
        return view('registroCliente');
    }

    public function storeCliente ( Request $request ) {
        $nvoCliente = new Cliente();
        $nvoCliente->nombre = $request->input("nombre");
        $nvoCliente->apellido = $request->input("apellido");
        $nvoCliente->usuario = $request->input("email");
        $nvoCliente->password = password_hash($request->input("password"), PASSWORD_DEFAULT);
        $nvoCliente->direccion = $request->input("direccion");

        return json_encode($nvoCliente);
    }
}
