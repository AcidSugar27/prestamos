<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class PagoController extends Controller
{

    public function index()
    {
        $pagos = Pago::paginate(10);
        return view('page.pago.index')->with('pagos',$pagos);
    }

    public function create()
    {
        return view('page.pago.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "id_prestamo" => "required|numeric",
            "abono" => "required|numeric"
        ]);
        
        $id_prestamo = $request->input('id_prestamo');
        $abono      = $request->input('abono');

        $prestamo   = Prestamo::findOrFail($id_prestamo);

       

        // VALIDAMOS SI EL MONTO NO HA SIDO SALDADO (PAGADO EN SU TOTALIDAD)
        if( $prestamo->pagado < $prestamo->total_a_pagar )
        {

            $pago = new Pago;
            $pago->id_prestamo = $id_prestamo;
            $pago->abono = $abono;
            $pago->save();
    
            $prestamo->pagado += $pago->abono;

            // VALIDAMOS SI EL PAGO HA SIDO FINALIZADO
            if( $prestamo->pagado == $prestamo->total_a_pagar )
            {
                $prestamo->estado = "CERRADO";
            }

            Session::flash('message',"Se abono $pago->abono a el prestamo con ID: $id_prestamo");
            $prestamo->save();
        }
        else
        {
            Session::flash('message',"El prestamo NO TIENE ADEUDO");
        }

        return view('page.pago.create');
    }

    public function show($id)
    {
        $pago = Pago::findOrFail($id);
        return view('page.pago.show')->with('pago',$pago);
    }

    public function edit($id)
    {
        return view('page.pago.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $pago       = Pago::findOrFail($id);
        $prestamo   = Prestamo::findOrFail($pago->id_prestamo);
        
        $prestamo->pagado -= $pago->abono;
        $prestamo->estado = "ABIERTO";
        $prestamo->save();

        Session::flash('message',"El Pago con ID $pago->id Fue Eliminado");
        $pago->delete();
        return redirect()->route('pagos.index');
    }
}
