<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cines', function (Blueprint $table) {
            $table->id('id_cine');
            $table->string('nombre', 100);
            $table->string('direccion', 255);
            $table->string('telefono', 20)->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cines');
    }
};
