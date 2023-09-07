<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Datos de ejemplo para la tabla "Cargos"
        $cargos = [
            ['cargo' => 'Gerente'],
            ['cargo' => 'Desarrollador'],
            ['cargo' => 'Diseñador'],
            // Agrega más registros si es necesario
        ];

        // Inserta los datos en la tabla "Cargos"
        Cargo::insert($cargos);
    }
}
