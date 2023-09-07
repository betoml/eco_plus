<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_proveedores',
        'id_impuestos_proveedores',
        'email_proveedores',
        'celular_proveedores',
        'celular_2_proveedores',
        'telefono_proveedores',
        'direccion_proveedores',
        'ciudad_proveedores',
        'pais_proveedores',
    ];
}
