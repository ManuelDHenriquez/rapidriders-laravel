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

        $client = new \GuzzleHttp\Client(); // GuzzleHttp\Client

        $response = $client->request('POST', 'http://localhost:8080/api/motorista/crearMotorista', [
            'json' => [
                'nombre' => $nvoMotorista->nombre,
                'apellido' => $nvoMotorista->apellido
            ]
        ]); 

        return redirect()->route('motoristas.motoristas');
    }

    public function motoristas () {
        $client = new \GuzzleHttp\Client(); // GuzzleHttp\Client

        $response = $client->request('GET', 'http://localhost:8080/api/motorista/obtener/todos');

        //cargar la respuesta del post
        $status = $response->getStatusCode();
        if ($status == 200) {
            $motoristas = json_decode($response->getBody());
            return view('motoristas', compact('motoristas'));
        } else {
            return redirect()->route('motoristas.motoristas');
        }
    }

    public function eliminarMotorista ( $id ) {
        return view('eliminarMotorista', compact('id'));
    }

    public function motoristaEliminar ( $id ) {
        $client = new \GuzzleHttp\Client(); // GuzzleHttp\Client

        $response = $client->request('DELETE', 'http://localhost:8080/api/motorista/eliminar?idmotorista='.$id);

        return redirect()->route('motoristas.motoristas');
    }
}
