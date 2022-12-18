<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PrestamoController extends Controller
{

    public function index()
    {
        $prestamos = Prestamo::paginate(10);
        return view('page.prestamo.index')->with('prestamos',$prestamos);
    }

    public function create()
    {
        return view('page.prestamo.create');
    }

    public function store(Request $request)
    {
        
        $request->validate(
            [
                "cedula" => "required|max:20",
                "monto" => "required|numeric",
                "interes" => "required|numeric",
                "plazo" => "required|numeric"
            ]
        );

        $cliente = Cliente::where('cedula','=',$request->input('cedula'))->first();
        if( $cliente == null )
        {
            Session::flash('message','La cedula del cliente NO EXISTE');
        }
        else
        {
            $prestamo = new Prestamo;
            $prestamo->id_cliente   = $cliente->id;
            $prestamo->monto        = $request->input('monto');
            $prestamo->pagado       = 0;
            $prestamo->interes      = $request->input('interes');
            $prestamo->plazo        = $request->input('plazo');
            $prestamo->estado       = "ABIERTO";
            $prestamo->save();
    
            Session::flash('message','El registro ha sido guardado con exito');
        }

        return view('page.prestamo.create');
    }

    public function show($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $cliente = Cliente::findOrFail($prestamo->id_cliente);

        return view('page.prestamo.show')->with('prestamo',$prestamo)->with('cliente',$cliente);
    }

    public function edit($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $cliente = Cliente::findOrFail($prestamo->id_cliente);
        return view('page.prestamo.edit')->with('prestamo',$prestamo)->with('cliente',$cliente);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                "monto" => "required|numeric",
                "interes" => "required|numeric",
                "plazo" => "required|numeric"
            ]
        );

        $prestamo = Prestamo::findOrFail($id);
        $prestamo->monto        = $request->input('monto');
        $prestamo->interes      = $request->input('interes');
        $prestamo->plazo        = $request->input('plazo');
        $prestamo->save();

        $cliente = Cliente::findOrFail($prestamo->id_cliente);

        Session::flash('message','El registro ha sido actualizado con exito');

        return view('page.prestamo.edit')->with('prestamo',$prestamo)->with('cliente',$cliente);
    }

    public function destroy($id)
    {
        $prestamo = Cliente::findOrFail($id);
        Session::flash('message',"El prestamo con ID $prestamo->id Fue Eliminado");
        $prestamo->delete();
        return redirect()->route('prestamos.index');
    }
}
