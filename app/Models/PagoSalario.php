<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoSalario extends Model
{
    use HasFactory;

    protected $table = 'pagos_salarios';

    protected $fillable = [
        'id_empleados',
        'valor',
        'estado',
    ];
}
