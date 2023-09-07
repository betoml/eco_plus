<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaGastosTable extends Migration
{
    public function up()
    {
        Schema::create('categoria_gastos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_categoria_gastos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categoria_gastos');
    }
}
