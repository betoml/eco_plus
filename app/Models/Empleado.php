<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres_empleados',
        'apellidos_empleados',
        'fecha_nacimiento_empleados',
        'email_empleados',
        'fecha_contratacion',
        'direccion_empleados',
        'ciudad_empleados',
        'pais_empleados',
        'celular_empleados',
        'id_cargos',
        'salario_empleados',
    ];
    
}
