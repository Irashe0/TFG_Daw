<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalasTable extends Migration
{
    public function up()
    {
        Schema::create('salas', function (Blueprint $table) {
            $table->increments('id_sala');
            $table->integer('id_cine');
            $table->string('nombre');
            $table->integer('capacidad');
            $table->foreign('id_cine')->references('id_cine')->on('cines');
        });
    }

    public function down()
    {
        Schema::dropIfExists('salas');
    }
}
