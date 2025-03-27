<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id_horario');
            $table->integer('id_pelicula');
            $table->integer('id_sala');
            $table->dateTime('fecha_hora');
            $table->foreign('id_pelicula')->references('id_pelicula')->on('peliculas');
            $table->foreign('id_sala')->references('id_sala')->on('salas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
