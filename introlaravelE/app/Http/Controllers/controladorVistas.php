<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validadorCliente;

class controladorVistas extends Controller
{
    public function home(){
        //inicio
        return view('inicio');
    }
    
    public function insert(){
        //formulario
        return view('formulario');
    }

    public function select(){
        //tarjetas del cliente
        return view('clientes');
    }

    public function procesaCliente(validadorCliente $peticion){
        //return 'la info del cliente llego al controlador';

        $usuario= $peticion->input('txtnombre');
        session()->flash('exito','Se guardo el usuario: '.$usuario);

        return to_route('formu');
    }


}
