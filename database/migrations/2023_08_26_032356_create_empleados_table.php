<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombres_empleados');
            $table->string('apellidos_empleados');
            $table->date('fecha_nacimiento_empleados');
            $table->string('email_empleados')->unique();
            $table->date('fecha_contratacion');
            $table->string('direccion_empleados');
            $table->string('ciudad_empleados');
            $table->string('pais_empleados');
            $table->string('celular_empleados');
            $table->unsignedBigInteger('id_cargos'); // Clave foránea
            $table->decimal('salario_empleados', 10, 2);
            $table->timestamps();

            // Definir la clave foránea
            $table->foreign('id_cargos')->references('id')->on('cargos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
