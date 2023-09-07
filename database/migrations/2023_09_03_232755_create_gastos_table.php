<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_categoria_gastos')->constrained('categoria_gastos');
            $table->decimal('valor', 10, 2);
            $table->text('observacion')->nullable();
            $table->boolean('firmado')->default(false);
            $table->boolean('solicitado')->default(false);
            $table->boolean('autorizado')->default(false);
            $table->string('estado');
            $table->string('comprobante')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gastos');
    }
}
