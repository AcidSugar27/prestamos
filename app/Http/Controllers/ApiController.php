<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Prestamo;

class ApiController extends Controller
{
    public function clientes()
    {
        $clientes = Cliente::all();
        return $clientes->toJson();
    }

    public function prestamo( Request $request )
    {
        $prestamo = Prestamo::findOrFail($request->input('id'));
        return $prestamo->toJson();
    }
    
    public function prestamosAbiertos()
    {
        $prestamos = Prestamo::where('estado', 'ABIERTO')->get();
        return $prestamos->toJson();
    }

    public function prestamoDelCliente( Request $request )
    {
        $cliente = Cliente::where('cedula',$request->input('cedula'))->first();
        $prestamos = Prestamo::where('id_cliente', $cliente->id)->get();
        return $prestamos->toJson();
    }
}
