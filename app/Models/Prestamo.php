<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;
    protected $table = "prestamos";
    protected $filable = [
        'id_cliente',
        'monto',
        'pagado',
        'total_a_pagar',
        'interes',
        'plazo',
        'estado'
    ];
}
