<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedDecimal('monto');                       // Cantidad Prestada
            $table->unsignedDecimal('total_a_pagar');
            $table->unsignedDecimal('pagado');                      // Cantidad Pagada
            $table->unsignedTinyInteger('interes');         // Porcentaje de Interes
            $table->string('plazo', 50);                    // Plazo del prestamo
            $table->enum('estado',['CERRADO','ABIERTO']);   // Status del Prestamo
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
