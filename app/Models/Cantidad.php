<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cantidad extends Model
{
    use HasFactory;
    protected $table = 'cantidades';
    protected $fillable = [
        'cantidad',
        'id_productos',
    ];

    // Definir relaciones si es necesario
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_productos');
    }
}
