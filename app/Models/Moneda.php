<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    use HasFactory;

    protected $table = 'monedas'; // Especifica el nombre de la tabla si es diferente al nombre del modelo.

    protected $fillable = [
        'nombre',
        'abreviatura',
    ];
}
