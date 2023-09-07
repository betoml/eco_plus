<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreciosTable extends Migration
{
    public function up()
    {
        Schema::create('precios', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor', 10, 2); // Cambia la precisión y escala según tus necesidades
            $table->unsignedBigInteger('id_grupos_precios');
            $table->unsignedBigInteger('id_productos');
            $table->timestamps();

            $table->foreign('id_grupos_precios')->references('id')->on('grupos_precios')->onDelete('cascade');
            $table->foreign('id_productos')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('precios');
    }
}
