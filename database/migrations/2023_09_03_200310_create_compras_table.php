<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->unsignedBigInteger('id_proveedores');
            $table->unsignedBigInteger('id_productos');
            $table->string('estado');
            $table->decimal('descuento', 8, 2);
            $table->decimal('envio', 8, 2);
            $table->decimal('total_precio', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
