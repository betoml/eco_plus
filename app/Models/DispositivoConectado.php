<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DispositivoConectado extends Model
{
    protected $table = 'dispositivos_conectados';

    protected $fillable = [
        'ip',
        'nombre_dispositivo',
        'id_erp_users',
        'id_empleados',
    ];

    // Definir relaciones con las tablas erp_users y empleados
    public function erpUser()
    {
        return $this->belongsTo(ErpUser::class, 'id_erp_users');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleados');
    }
}
