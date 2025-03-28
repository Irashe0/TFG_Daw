<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id('id_horario');
            $table->unsignedBigInteger('id_pelicula'); 
            $table->unsignedBigInteger('id_sala'); 
            $table->dateTime('fecha_hora');
            $table->timestamps();

            $table->foreign('id_pelicula')->references('id_pelicula')->on('peliculas')->onDelete('cascade');
            $table->foreign('id_sala')->references('id_sala')->on('salas')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
};
