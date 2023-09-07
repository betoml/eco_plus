<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCantidadesTable extends Migration
{
    public function up()
    {
        Schema::create('cantidades', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->unsignedBigInteger('id_productos');
            $table->foreign('id_productos')->references('id')->on('productos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cantidades');
    }
}

