<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_detalle_ventas',
        'id_clientes',
        'id_empleados',
    ];

    // Define las relaciones con otras tablas si es necesario

    public function detalleVenta()
    {
        return $this->belongsTo(DetalleVenta::class, 'id_detalle_ventas');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_clientes');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleados');
    }
}
