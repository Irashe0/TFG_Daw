<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('salas', function (Blueprint $table) {
            $table->id('id_sala');
            $table->unsignedBigInteger('id_cine'); 
            $table->string('nombre', 50);
            $table->integer('capacidad');
            $table->timestamps();
            $table->foreign('id_cine')->references('id_cine')->on('cines')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('salas');
    }
};
