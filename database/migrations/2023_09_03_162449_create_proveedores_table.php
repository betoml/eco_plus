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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_proveedores');
            $table->string('id_impuestos_proveedores')->nullable();
            $table->string('email_proveedores')->nullable();
            $table->string('celular_proveedores')->nullable();
            $table->string('celular_2_proveedores')->nullable();
            $table->string('telefono_proveedores')->nullable();
            $table->string('direccion_proveedores')->nullable();
            $table->string('ciudad_proveedores')->nullable();
            $table->string('pais_proveedores')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
