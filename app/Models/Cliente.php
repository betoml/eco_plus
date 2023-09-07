<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_cliente',
        'apellidos_cliente',
        'email_cliente',
        'telefono_cliente',
        'celular_cliente',
        'direccion_cliente',
        'ciudad_cliente',
        'pais_cliente',
    ];
}
