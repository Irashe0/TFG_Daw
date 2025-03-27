<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectorTable extends Migration
{
    public function up()
    {
        Schema::create('director', function (Blueprint $table) {
            $table->increments('id_director');
            $table->string('nombre');
            $table->string('apellidos')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('director');
    }
}
