<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::paginate(10);
        return view('page.cliente.index')->with('clientes',$clientes);
    }

    public function create()
    {
        return view('page.cliente.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "nombre"    => "required|max:100",
                "apellido"  => "required|max:100",
                "cedula"    => "required|max:20",
                "telefono"  => "required|max:18",
                "email"     => "required|max:100",
                "direccion" => "required|max:100",
                "estado_civil" => "required|max:50"
            ]
        );

        $cliente = new Cliente;
        $cliente->nombre    = $request->input('nombre');
        $cliente->apellido  = $request->input('apellido');
        $cliente->cedula    = $request->input('cedula');
        $cliente->telefono  = $request->input('telefono');
        $cliente->email     = $request->input('email');
        $cliente->direccion = $request->input('direccion');
        $cliente->estado_civil = $request->input('estado_civil');
        $cliente->save();

        Session::flash('message','El registro ha sido guardado con exito');

        return view('page.cliente.create');
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('page.cliente.show')->with('cliente',$cliente);
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('page.cliente.edit')->with('cliente',$cliente);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                "nombre"    => "required|max:100",
                "apellido"  => "required|max:100",
                "cedula"    => "required|max:20",
                "telefono"  => "required|max:18",
                "email"     => "required|max:100",
                "direccion" => "required|max:100",
                "estado_civil" => "required|max:50"
            ]
        );

        $cliente = Cliente::findOrFail($id);
        $cliente->nombre    = $request->input('nombre');
        $cliente->apellido  = $request->input('apellido');
        $cliente->cedula    = $request->input('cedula');
        $cliente->telefono  = $request->input('telefono');
        $cliente->email     = $request->input('email');
        $cliente->direccion = $request->input('direccion');
        $cliente->estado_civil = $request->input('estado_civil');
        $cliente->save();

        Session::flash('message',"El Cliente con ID: $cliente->id Ha sido Actualizado");

        return view('page.cliente.edit')->with('cliente',$cliente);
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        Session::flash('message',"El cliente $cliente->nombre $cliente->apellido Fue Eliminado");
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
