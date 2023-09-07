<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaGasto extends Model
{
    use HasFactory;
    
    protected $table = 'categoria_gastos'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre_categoria_gastos',
    ];
}
