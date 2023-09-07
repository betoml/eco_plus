<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferenciasTable extends Migration
{
    public function up()
    {
        Schema::create('transferencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('origen_id');
            $table->unsignedBigInteger('destino_id');
            $table->integer('cantidad');
            $table->unsignedBigInteger('empleado_id');
            $table->string('tipo_transferencia');
            $table->string('estado'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transferencias');
    }
}
