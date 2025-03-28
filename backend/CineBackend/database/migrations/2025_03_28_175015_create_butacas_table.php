<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('butacas', function (Blueprint $table) {
            $table->id('id_butaca');
            $table->unsignedBigInteger('id_sala'); 
            $table->string('fila', 10);
            $table->integer('numero');
            $table->enum('estado', ['Disponible', 'Reservada', 'Ocupada'])->default('Disponible');
            $table->timestamps();

            $table->foreign('id_sala')->references('id_sala')->on('salas')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('butacas');
    }
};
