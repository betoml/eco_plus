<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosSalariosTable extends Migration
{
    public function up()
    {
        Schema::create('pagos_salarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_empleados');
            $table->decimal('valor', 10, 2);
            $table->string('estado')->default('pendiente'); // Cambiar el valor predeterminado si es necesario
            $table->timestamps();
            
            // Clave externa para relacionar con la tabla "empleados"
            $table->foreign('id_empleados')->references('id')->on('empleados')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagos_salarios');
    }
}
