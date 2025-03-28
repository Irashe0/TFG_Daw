<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('miembros', function (Blueprint $table) {
            $table->id('id_miembro');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('email', 100)->unique();
            $table->unsignedBigInteger('id_rol')->nullable(); 
            $table->timestamps();

            $table->foreign('id_rol')->references('id_rol')->on('roles')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('miembros');
    }
};
