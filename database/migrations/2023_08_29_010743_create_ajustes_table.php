<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAjustesTable extends Migration
{
    public function up()
    {
        Schema::create('ajustes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_empresa');
            $table->string('logo_empresa')->nullable();
            $table->string('direccion_empresa')->nullable();
            $table->string('email_empresa')->nullable();
            $table->string('contacto_empresa')->nullable();
            $table->unsignedBigInteger('id_monedas');
            $table->unsignedBigInteger('id_zona_horario');
            $table->enum('formato_horario', ['24 horas', 'AM/PM']);
            $table->timestamps();

            // Definir las relaciones con las tablas monedas y zona_horario
            $table->foreign('id_monedas')->references('id')->on('monedas');
            $table->foreign('id_zona_horario')->references('id')->on('zona_horario');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ajustes');
    }
}
