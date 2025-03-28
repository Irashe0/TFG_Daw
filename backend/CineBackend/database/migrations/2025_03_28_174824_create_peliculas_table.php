<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id('id_pelicula');
            $table->string('titulo');
            $table->unsignedBigInteger('id_director')->nullable(); 
            $table->string('sinopsis', 255)->nullable();
            $table->integer('duracion')->nullable();
            $table->string('clasificacion', 50)->nullable();
            $table->string('productora', 50)->nullable();
            $table->timestamps();

            $table->foreign('id_director')->references('id_director')->on('director')->onDelete('set null'); 
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
};
