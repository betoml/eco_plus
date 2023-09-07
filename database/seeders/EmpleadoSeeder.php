<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
             // Datos de ejemplo para la tabla "Empleados"
             $empleados = [
                [
                    'nombres_empleados' => 'Juan',
                    'apellidos_empleados' => 'Pérez',
                    'fecha_nacimiento_empleados' => '1990-05-15',
                    'email_empleados' => 'juan@example.com',
                    'fecha_contratacion' => '2022-01-10',
                    'direccion_empleados' => 'Calle Principal 123',
                    'ciudad_empleados' => 'Ciudad A',
                    'pais_empleados' => 'País X',
                    'celular_empleados' => '123-456-7890',
                    'id_cargos' => 1, // Asigna el ID del cargo correspondiente
                    'salario_empleados' => 50000.00,
                ],
                [
                    'nombres_empleados' => 'María',
                    'apellidos_empleados' => 'González',
                    'fecha_nacimiento_empleados' => '1985-08-20',
                    'email_empleados' => 'maria@example.com',
                    'fecha_contratacion' => '2021-03-05',
                    'direccion_empleados' => 'Avenida Principal 456',
                    'ciudad_empleados' => 'Ciudad B',
                    'pais_empleados' => 'País Y',
                    'celular_empleados' => '987-654-3210',
                    'id_cargos' => 2, // Asigna el ID del cargo correspondiente
                    'salario_empleados' => 60000.00,
                ],
                // Agrega más registros si es necesario
            ];
    
            // Inserta los datos en la tabla "Empleados"
            Empleado::insert($empleados);
    }
}
