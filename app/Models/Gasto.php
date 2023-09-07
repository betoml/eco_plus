<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;

    protected $table = 'gastos';

    protected $fillable = [
        'id_categoria_gastos',
        'valor',
        'observacion',
        'firmado',
        'solicitado',
        'autorizado',
        'estado',
        'comprobante',
    ];

    // Define las relaciones con otras tablas si es necesario
    public function categoriaGastos()
    {
        return $this->belongsTo(CategoriaGasto::class, 'id_categoria_gastos');
    }
}
