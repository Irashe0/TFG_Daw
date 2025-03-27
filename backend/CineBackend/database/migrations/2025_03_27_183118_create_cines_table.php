<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinesTable extends Migration
{
    public function up()
    {
        Schema::create('cines', function (Blueprint $table) {
            $table->increments('id_cine');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('telefono', 20)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cines');
    }
}
