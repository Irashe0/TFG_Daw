<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id_venta');
            $table->integer('id_reserva');
            $table->string('numero_venta');
            $table->decimal('total_venta', 10, 2);
            $table->foreign('id_reserva')->references('id_reserva')->on('reservas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
