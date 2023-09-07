<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    use HasFactory;

    protected $table = 'transferencias';

    protected $fillable = [
        'producto_id',
        'almacen_id',
        'ubicacion_comercial_id',
        'cantidad',
        'empleado_id',
        'estado',
    ];

    // Define las relaciones con otras tablas
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class, 'almacen_id');
    }

    public function ubicacionComercial()
    {
        return $this->belongsTo(UbicacionComercial::class, 'ubicacion_comercial_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
}
