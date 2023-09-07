<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;

    protected $table = 'almacenes'; // Nombre de la tabla en la base de datos
    protected $fillable = [
        'nombre_almacen',
        'direccion_almacen',
        'ciudad_almacen',
        'pais_almacen',
        'celular_almacen',
        'telefono_almacen',
        'email_almacen',
    ];
}
