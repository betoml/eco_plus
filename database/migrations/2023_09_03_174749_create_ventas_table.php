<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_detalle_ventas');
            $table->unsignedBigInteger('id_clientes');
            $table->unsignedBigInteger('id_empleados');
            $table->timestamps();

            $table->foreign('id_detalle_ventas')->references('id')->on('detalle_ventas');
            $table->foreign('id_clientes')->references('id')->on('clientes');
            $table->foreign('id_empleados')->references('id')->on('empleados');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}

