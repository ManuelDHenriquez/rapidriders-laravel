<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productosController extends Controller
{
    //

    public function productos()
    {
        $client = new \GuzzleHttp\Client(); // GuzzleHttp\Client

        $response = $client->request('GET', 'http://localhost:8080/api/producto/obtener/todos');

        //cargar la respuesta del post
        $status = $response->getStatusCode();
        if ($status == 200) {
            $productos = json_decode($response->getBody());
            return view('productos', compact('productos'));
        } else {
            return redirect()->route('productos.productos');
        }
    }

    public function registrarProducto()
    {
        $client = new \GuzzleHttp\Client(); // GuzzleHttp\Client

        $response = $client->request('GET', 'http://localhost:8080/api/comercio/obtener/todos');

        //cargar la respuesta del post
        $status = $response->getStatusCode();
        if ($status == 200) {
            $comercios = json_decode($response->getBody());
            return view('registrarProducto', compact('comercios'));
        } else {
            return redirect()->route('productos.productos');
        }
    }

    public function productoStore(Request $request)
    {
        $client = new \GuzzleHttp\Client(); // GuzzleHttp\Client

        $response = $client->request('POST', 'http://localhost:8080/api/producto/crearProducto', [
            'json' => [
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'precio' => $request->precio,
                'idcomercio' => $request->idcomercio
            ]
        ]);

        //cargar la respuesta del post
        $status = $response->getStatusCode();
        if ($status == 200) {
            return redirect()->route('productos.productos');
        } else {
            return redirect()->route('productos.productos');
        }
    }


    public function eliminarProducto($id)
    {
        return view('eliminarProducto', compact('id'));
    }

    public function productoEliminar($id)
    {
        $client = new \GuzzleHttp\Client(); // GuzzleHttp\Client

        $response = $client->request('DELETE', 'http://localhost:8080/api/producto/eliminar?idproducto=' . $id);

        //cargar la respuesta del post
        $status = $response->getStatusCode();
        if ($status == 200) {
            return redirect()->route('productos.productos');
        } else {
            return redirect()->route('productos.productos');
        }
    }
}
