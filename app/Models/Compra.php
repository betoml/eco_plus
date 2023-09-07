<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_proveedores',
        'id_productos',
        'cantidad',
        'estado',
        'descuento',
        'envio',
        'total_precio',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedores');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_productos');
    }
}
