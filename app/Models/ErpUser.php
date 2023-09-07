<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens; // Importa el trait HasApiTokens
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ErpUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'erp_users'; // Nombre de la tabla personalizada

    protected $fillable = [
        'user',
        'password',
        'id_empleados',
        'activo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public $timestamps = false; // Si no necesitas campos de timestamps en esta tabla

    protected $primaryKey = 'id'; // Si el campo de clave primaria no se llama 'id'

    protected $username = 'user'; // Configurar la columna utilizada para la autenticación

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleados');
    }
}
