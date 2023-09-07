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
        Schema::create('erp_users', function (Blueprint $table) {
            $table->id();
            $table->string('user')->unique();
            $table->string('password');
            $table->unsignedBigInteger('id_empleados'); // Clave foránea
            $table->boolean('activo')->default(true);
            $table->timestamps();

            // Definir la clave foránea
            $table->foreign('id_empleados')->references('id')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('erp_users');
    }
};
