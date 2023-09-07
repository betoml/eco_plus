<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UbicacionComercial extends Model
{
    use HasFactory;

    protected $table = 'ubicaciones_comerciales';

    protected $fillable = [
        'id_ajustes',
        'direccion_ubicacion_comercial',
        'ciudad_ubicacion_comercial',
        'pais_ubicacion_comercial',
        'telefono_ubicacion_comercial',
        'telefono_2_ubicacion_comercial',
        'celular_ubicacion_comercial',
        'celular_2_ubicacion_comercial',
        'email_ubicacion_comercial',
        'email_2_ubicacion_comercial',
    ];
}
