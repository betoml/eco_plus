<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor',
        'id_grupos_precios',
        'id_productos',
    ];

    // Relación con la tabla grupos_precios
    public function grupoPrecio()
    {
        return $this->belongsTo(GrupoPrecio::class, 'id_grupos_precios');
    }

    // Relación con la tabla productos
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_productos');
    }
}
