<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class carritoController extends Controller
{
    //

    public function comercios () {
        $client = new \GuzzleHttp\Client(); // GuzzleHttp\Client

        $response = $client->request('GET', 'http://localhost:8080/api/comercio/obtener/todos');

        //cargar la respuesta del post
        $status = $response->getStatusCode();
        if ($status == 200) {
            $comercios = json_decode($response->getBody());
            return view('carritoComercio', compact('comercios'));
        } else {
            return redirect()->route('carrito.comercios');
        }
    }

    public function productos ( $id ) {
        $client = new \GuzzleHttp\Client(); // GuzzleHttp\Client

        $response = $client->request('GET', 'http://localhost:8080/api/producto/obtener/todos');

        $response2 = $client->request('GET', 'http://localhost:8080/api/comercio/obtener/todos');



        //cargar la respuesta del post
        $status = $response->getStatusCode();
        if ($status == 200) {
            $productos = json_decode($response->getBody());
            $comercios = json_decode($response2->getBody());
            return view('carritoProductos', compact('productos', 'comercios', 'id'));
        } else {
            return redirect()->route('carrito.productos');
        }
    }

    public function crearPedido ( Request $request ) {

        $descripcion = $request->input("idcomercio");

        
        return $request;
    }

}
