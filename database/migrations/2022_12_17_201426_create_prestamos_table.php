<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');       // ID del cliente que solicito el prestamo
            $table->unsignedDecimal('monto')
                    ->comment('Es la cantidad prestada al cliente');
            $table->unsignedDecimal('total_a_pagar')
                    ->comment('Es el monto prestado mas el interes');
            $table->unsignedDecimal('pagado')
                    ->comment('Cantidad paga por el cliente');
            $table->unsignedTinyInteger('interes')
                    ->comment('porcentaje de interes sobre el prestamo');
            $table->string('plazo', 50)
                    ->comment('tiempo para pagar el prestamo');
            $table->enum('estado', ['CERRADO', 'ABIERTO'])
                    ->comment('cerrdo si el prestamo se pago, bierto en caso contrario');
            $table->timestamps();

            $table->foreign('id_cliente')
                ->references('id')->on('clientes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
};
