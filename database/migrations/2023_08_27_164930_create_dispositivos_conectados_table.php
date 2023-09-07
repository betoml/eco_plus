<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispositivosConectadosTable extends Migration
{
    public function up()
    {
        Schema::create('dispositivos_conectados', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('nombre_dispositivo');
            $table->unsignedBigInteger('id_erp_users'); // Clave foránea para la tabla erp_users
            $table->unsignedBigInteger('id_empleados'); // Clave foránea para la tabla empleados
            $table->timestamps();

            // Definir relaciones con las tablas erp_users y empleados
            $table->foreign('id_erp_users')->references('id')->on('erp_users');
            $table->foreign('id_empleados')->references('id')->on('empleados');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dispositivos_conectados');
    }
}
