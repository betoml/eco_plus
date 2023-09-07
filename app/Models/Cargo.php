<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $table = 'cargos'; // Nombre de la tabla en la base de datos

    protected $fillable = ['cargo']; // Lista de campos que se pueden llenar

    // Otras propiedades y métodos del modelo, si es necesario
}
