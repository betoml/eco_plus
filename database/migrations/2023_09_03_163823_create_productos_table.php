<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto');
            $table->text('descripcion')->nullable();
            $table->string('img_proveedores')->nullable();
            $table->unsignedBigInteger('id_proveedores');
            $table->unsignedBigInteger('id_marcas');
            $table->timestamps();

            $table->foreign('id_proveedores')->references('id')->on('proveedores')->onDelete('cascade');
            $table->foreign('id_marcas')->references('id')->on('marcas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}

