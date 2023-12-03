<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class comercioController extends Controller
{
    //

    public function comercios()
    {
        $client = new \GuzzleHttp\Client(); // GuzzleHttp\Client

        $response = $client->request('GET', 'http://localhost:8080/api/comercio/obtener/todos');

        //cargar la respuesta del post
        $status = $response->getStatusCode();
        if ($status == 200) {
            $comercios = json_decode($response->getBody());
            return view('comercios', compact('comercios'));
        } else {
            return redirect()->route('comercios.comercios');
        }
    }

    public function registrarComercio()
    {
        return view('registrarComercio');
    }

    public function comercioStore(Request $request)
    {
        $client = new \GuzzleHttp\Client(); // GuzzleHttp\Client

        $response = $client->request('POST', 'http://localhost:8080/api/comercio/crearComercio', [
            'json' => [
                'nombre' => $request->nombre,
                'direccion' => $request->direccion,
                'latitud' => $request->latitud,
                'longitud' => $request->longitud
            ]
        ]);

        //cargar la respuesta del post
        $status = $response->getStatusCode();
        if ($status == 200) {
            return redirect()->route('comercios.comercios');
        } else {
            return redirect()->route('comercios.registrarComercio');
        }
    }

    public function eliminarComercio($id)
    {
        return view('eliminarComercio', compact('id'));
    }

    public function comercioEliminar($id)
    {
        $client = new \GuzzleHttp\Client(); // GuzzleHttp\Client

        $response = $client->request('DELETE', 'http://localhost:8080/api/comercio/eliminar?idcomercio=' . $id);

        //cargar la respuesta del post
        $status = $response->getStatusCode();
        if ($status == 200) {
            return redirect()->route('comercios.comercios');
        } else {
            return redirect()->route('comercios.comercios');
        }
    }

    public function comercio($id)
    {
        $client = new \GuzzleHttp\Client(); // GuzzleHttp\Client

        $response = $client->request('GET', 'http://localhost:8080/api/comercio/obtener?idcomercio=' . $id);

        //cargar la respuesta del post
        $status = $response->getStatusCode();
        if ($status == 200) {
            $comercio = json_decode($response->getBody());
            return view('comercio', compact('comercio'));
        } else {
            return redirect()->route('comercios.comercios');
        }
    }

    public function obtnerComercios()
    {
        $client = new \GuzzleHttp\Client(); // GuzzleHttp\Client

        $response = $client->request('GET', 'http://localhost:8080/api/comercio/obtener/todos');

        //cargar la respuesta del post
        $status = $response->getStatusCode();
        if ($status == 200) {
            $comercios = json_decode($response->getBody());
            return compact('comercios');
        } else {
            return json_encode(array('error'=> 404, 'message'=> "No se encontraron comercios"));
        }
    }
}
