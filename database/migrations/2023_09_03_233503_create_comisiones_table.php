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
        Schema::create('comisiones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ventas');
            $table->decimal('valor', 10, 2);
            $table->string('estado');
            $table->unsignedBigInteger('id_empleados');
            $table->timestamps();

            // Definir las relaciones con otras tablas
            $table->foreign('id_ventas')->references('id')->on('ventas');
            $table->foreign('id_empleados')->references('id')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comisiones');
    }
};
