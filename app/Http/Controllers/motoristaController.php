<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class motorista {
    public $nombre;
    public $apellido;

}

class motoristaController extends Controller
{
    //
    public function registrarMotorista () {
        return view('registroMotoristas');
    }

    public function storeMotorista ( Request $request ) {
        $nvoMotorista = new Motorista();
        $nvoMotorista->nombre = $request->input("nombre");
        $nvoMotorista->apellido = $request->input("apellido");

        return json_encode($nvoMotorista);
    }
}
