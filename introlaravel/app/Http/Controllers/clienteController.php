<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\validadorCliente;

class clienteController extends Controller
{
    public function home(){
        return view('inicio');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultarClientes= DB::table('cliente')->get();
        return view('clientes', compact('consultarClientes'));
    }

    /**
     * Para abrir el formulario
     */
    public function create()
    {
        return view('formulario');
    }

    /**
     * Aqui preparo el store
     */
    public function store(validadorCliente $request)
    {
        DB::table('cliente')->insert([
            "nombre"=>$request->input('txtnombre'),
            "apellido"=>$request->input('txtapellido'),
            "correo"=>$request->input('txtcorreo'),
            "telefono"=>$request->input('txttelefono'),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ]);
        $usuario=$request->input('txtnombre','txtapellido');
        session()->flash('exito','Se guardo el usuario: '.$usuario);
        return to_route('formu');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = DB::table('cliente')->where('id', $id)->first();

        if (!$cliente) {
        return redirect()->route('consulta')->with('error', 'Cliente no encontrado.');
        }

        return view('formulario', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validación de los datos ingresados
        $request->validate([
        'txtnombre' => 'required|string|max:255',
        'txtapellido' => 'required|string|max:255',
        'txtcorreo' => 'required|email|max:255',
        'txttelefono' => 'required|numeric',
        ]);

        // Actualizar los datos del cliente en la base de datos
        $updated = DB::table('cliente')
        ->where('id', $id)
        ->update([
            "nombre" => $request->input('txtnombre'),
            "apellido" => $request->input('txtapellido'),
            "correo" => $request->input('txtcorreo'),
            "telefono" => $request->input('txttelefono'),
            "updated_at" => Carbon::now(),
        ]);

        // Confirmar actualización
        if ($updated) {
        return redirect()->route('consulta')->with('exito', 'Cliente actualizado correctamente.');
        } else {
        return redirect()->route('consulta')->with('error', 'No se pudo actualizar el cliente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Intentar eliminar el cliente
        $deleted = DB::table('cliente')->where('id', $id)->delete();

        // Confirmar eliminación
        if ($deleted) {
        return redirect()->route('consulta')->with('exito', 'Cliente eliminado correctamente.');
        } else {
        return redirect()->route('consulta')->with('error', 'No se pudo eliminar el cliente.');
        }
    }
}
