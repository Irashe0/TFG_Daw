<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->unsignedBigInteger('id_miembro'); 
            $table->unsignedBigInteger('id_rol')->nullable(); 
            $table->string('nombre_usuario', 50);
            $table->string('pass_usuario', 255);
            $table->timestamps();

            $table->foreign('id_miembro')->references('id_miembro')->on('miembros')->onDelete('cascade'); 
            $table->foreign('id_rol')->references('id_rol')->on('roles')->onDelete('set null'); 
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
