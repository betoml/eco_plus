<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZonaHorario extends Model
{
    use HasFactory;

    protected $table = 'zona_horario';

    protected $fillable = [
        'pais',
        'gmt',
    ];
}
