<?php

namespace Database\Seeders;

use App\Models\ErpUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ErpUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      // Datos de ejemplo para la tabla "Erp_Users"
      $users = [
        [
            'user' => 'usuario1',
            'password' => Hash::make('contraseña1'), // Cifra la contraseña
            'id_empleados' => 1,
            'activo' => true,
        ],
        [
            'user' => 'usuario2',
            'password' => Hash::make('contraseña2'),
            'id_empleados' => 2,
            'activo' => true,
        ],
        // Agrega más registros si es necesario
    ];

    // Inserta los datos en la tabla "Erp_Users"
    ErpUser::insert($users);
    }
}
