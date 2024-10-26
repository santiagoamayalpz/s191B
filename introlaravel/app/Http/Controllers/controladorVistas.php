<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controladorVistas extends Controller
{
    public function home(){
        return view('inicio');
    }

    public function insert(){
        return view('formulario');
    }

    public function select(){
        return view('clientes'); 
    }

    public function procesaCliente(Request $peticion){

        $validacion= $peticion->validate([ 
            'txtnombre'=> 'required|min:3|max:20',
            'txtapellido'=> 'required',
            'txtcorreo'=> 'required|email',
            'txttelefono'=> 'required|numeric',
        ]);
        
        /* redireccion usando la ruta */
        //return redirect('/');

        /* redireccion usando el nombre de la ruta */
        //return redirect()->route('rutaclientes');

        /* redireccion al origen de peticion */
        /* return back(); */

        //redireccion con valores adjunto (variables, arreglos, etc..)
        /* $id=[['usuario'=>'1'],['usuario'=>'2']];
        return view ('formulario', compact('id')); */

        //Redireccion enviando mi session
        $usuario=$peticion->input('txtnombre','txtapellido');
        session()->flash('exito','Se guardo el usuario: '.$usuario);
        return to_route('formu');
        
    }
}

