<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('id_venta');

            $table->unsignedBigInteger('id_reserva');
            $table->unsignedBigInteger('id_butaca');
            $table->decimal('total', 10, 2);
            $table->timestamps();

            $table->foreign('id_reserva')->references('id_reserva')->on('reservas')->onDelete('cascade');
            $table->foreign('id_butaca')->references('id_butaca')->on('butacas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ventas');
    }
};
