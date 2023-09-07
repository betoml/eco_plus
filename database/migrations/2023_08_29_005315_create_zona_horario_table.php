<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonaHorarioTable extends Migration
{
    public function up()
    {
        Schema::create('zona_horario', function (Blueprint $table) {
            $table->id();
            $table->string('pais');
            $table->string('gmt');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zona_horario');
    }
}
