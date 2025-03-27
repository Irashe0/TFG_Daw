<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id_factura');
            $table->integer('id_venta');
            $table->string('numero_factura');
            $table->date('fecha_emision');
            $table->decimal('total_factura', 10, 2);
            $table->foreign('id_venta')->references('id_venta')->on('ventas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
