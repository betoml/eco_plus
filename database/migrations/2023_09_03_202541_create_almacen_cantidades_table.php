<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenCantidadesTable extends Migration
{
    public function up()
    {
        Schema::create('almacen_cantidades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_productos');
            $table->unsignedBigInteger('id_almacenes');
            $table->integer('cantidad');
            $table->timestamps();

            // Restricciones de clave foránea
            $table->foreign('id_productos')->references('id')->on('productos');
            $table->foreign('id_almacenes')->references('id')->on('almacenes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('almacen_cantidades');
    }
}
