<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'detalle_ventas';

    // Lista de atributos que se pueden asignar de forma masiva
    protected $fillable = [
        'precio_final',
        'cantidad',
        'descuento',
        'observaciones',
        'id_productos',
    ];

    // Relación con el modelo Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_productos');
    }
}
