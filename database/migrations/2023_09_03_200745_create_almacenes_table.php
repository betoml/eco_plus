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
        Schema::create('almacenes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_almacen');
            $table->string('direccion_almacen');
            $table->string('ciudad_almacen');
            $table->string('pais_almacen');
            $table->string('celular_almacen');
            $table->string('telefono_almacen')->nullable();
            $table->string('email_almacen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('almacenes');
    }
};
