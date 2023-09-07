<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoPrecios extends Model
{
    use HasFactory;
    protected $table = 'grupos_precios';

    protected $fillable = [
        'nombre_grupo_precios',
    ];
}
