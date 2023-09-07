<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comision extends Model
{
    use HasFactory;
    protected $table = 'comisiones'; 
    protected $fillable = [
        'id_ventas',
        'valor',
        'estado',
        'id_empleados',
    ];

    // Define las relaciones con otras tablas
    public function venta()
    {
        return $this->belongsTo(Venta::class, 'id_ventas');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleados');
    }
}