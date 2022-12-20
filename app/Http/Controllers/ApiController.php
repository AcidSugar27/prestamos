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

    public function prestamosAbiertos()
    {
        $prestamos = Prestamo::where('estado', 'ABIERTO')->get();
        return $prestamos->toJson();
    }
}
