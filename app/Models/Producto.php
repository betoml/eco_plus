<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_producto',
        'descripcion',
        'img_proveedores',
        'id_proveedores',
        'id_marcas',
    ];
}
