<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmacenCantidad extends Model
{
    use HasFactory;

    protected $table = 'almacen_cantidades';

    protected $fillable = [
        'id_productos',
        'id_almacenes',
        'cantidad',
    ];

    // Define relaciones u otros métodos personalizados aquí, si es necesario.
}
