<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id('id_reserva');
            $table->unsignedBigInteger('id_miembro');
            $table->unsignedBigInteger('id_horario');
            $table->timestamps();

            $table->foreign('id_miembro')->references('id_miembro')->on('miembros')->onDelete('cascade');
            $table->foreign('id_horario')->references('id_horario')->on('horarios')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservas');
    }
};
