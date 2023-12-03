<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Promise;

class Cliente
{
    public $nombre;
    public $apellido;
    public $correo;
    public $direccion;
    public $contrasena;
    public $pedidos;
}
class clienteController extends Controller
{
    //



    public function registrarCliente()
    {
        return view('registroCliente');
    }

    public function storeCliente(Request $request)
    {

        $client = new \GuzzleHttp\Client(); // GuzzleHttp\Client

        $nvoCliente = new Cliente();
        $nvoCliente->nombre = $request->input("nombre");
        $nvoCliente->apellido = $request->input("apellido");
        $nvoCliente->correo = $request->input("email");
        $nvoCliente->direccion = $request->input("direccion");
        $nvoCliente->contrasena = password_hash($request->input("password"), PASSWORD_DEFAULT);
        $nvoCliente->pedidos = [];


        $response = $client->request('POST', 'http://localhost:8080/api/clientes/crearCliente', [
            'json' => [
                'nombre' => $nvoCliente->nombre,
                'apellido' => $nvoCliente->apellido,
                'correo' => $nvoCliente->correo,
                'direccion' => $nvoCliente->direccion,
                'contrasena' => $nvoCliente->contrasena,
                'pedidos' => $nvoCliente->pedidos
            ]
        ]);

        //cargar la respuesta del post 
        $status = $response->getStatusCode();
        if ($status == 200) {
            return redirect()->route('clientes.clientes');
         } else {
            return redirect()->route('clientes.registrarCliente');
        }
    }

    public function cargarClientes()
    {
        $client = new \GuzzleHttp\Client(); // GuzzleHttp\Client

        $response = $client->request('GET', 'http://localhost:8080/api/clientes/obtener/todos');

        // cargar la respuesta del post 
        return view('clientes', ['clientes' => json_decode($response->getBody()->getContents())]);
    }

    public function eliminarCliente($id){
        return view('eliminarClientes', compact('id'));
    }

    public function clienteEliminar($id){
        $client = new \GuzzleHttp\Client(); // GuzzleHttp\Client

        $response = $client->request('DELETE', 'http://localhost:8080/api/clientes/eliminar?idcliente='.$id);

        // cargar la respuesta del post 
        return redirect()->route('clientes.clientes');
    }
}
