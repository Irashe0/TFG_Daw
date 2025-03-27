<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasTable extends Migration
{
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->increments('id_pelicula');
            $table->string('titulo');
            $table->integer('id_director')->nullable();
            $table->string('sinopsis')->nullable();
            $table->integer('duracion')->nullable();
            $table->string('clasificacion')->nullable();
            $table->string('productora')->nullable();
            $table->foreign('id_director')->references('id_director')->on('director');
        });
    }

    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
}
