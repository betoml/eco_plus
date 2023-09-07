<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajustes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_empresa',
        'logo_empresa',
        'direccion_empresa',
        'email_empresa',
        'contacto_empresa',
        'id_monedas',
        'id_zona_horario',
        'formato_horario',
    ];

    public function moneda()
    {
        return $this->belongsTo(Moneda::class, 'id_monedas');
    }

    public function zonaHorario()
    {
        return $this->belongsTo(ZonaHorario::class, 'id_zona_horario');
    }
}
