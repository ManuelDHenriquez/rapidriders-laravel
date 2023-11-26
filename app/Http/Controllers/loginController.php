<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    //

    public function index () {
        return view('login');
    }

    public function logIn ( Request $request ) {
        return 'Usuario: ' . $request->input("usuario") . ' Contraseña: '. password_hash($request->input("password"), PASSWORD_DEFAULT)."\n";
    } 
}
