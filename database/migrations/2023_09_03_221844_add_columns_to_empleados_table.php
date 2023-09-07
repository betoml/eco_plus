<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->boolean('comisiones')->default(false);
            $table->decimal('porcentaje_comision', 5, 2)->nullable();
        });
    }

    public function down()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropColumn('comisiones');
            $table->dropColumn('porcentaje_comision');
        });
    }
}

