<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZonaHorarioSeeder extends Seeder
{
    public function run()
    {
        $zonasHorarias = [
            ['pais' => 'Estados Unidos', 'gmt' => '-05:00'],
            ['pais' => 'Nicaragua', 'gmt' => '-06:00'],
            ['pais' => 'Bolivia', 'gmt' => '-04:00'],
            ['pais' => 'Brasil', 'gmt' => '-03:00'],
            ['pais' => 'Argentina', 'gmt' => '-03:00'],
            ['pais' => 'Chile', 'gmt' => '-03:00'],
            ['pais' => 'Perú', 'gmt' => '-05:00'],
            ['pais' => 'México', 'gmt' => '-06:00'],
            ['pais' => 'España', 'gmt' => '+01:00'],
            ['pais' => 'Francia', 'gmt' => '+01:00'],
            ['pais' => 'Alemania', 'gmt' => '+01:00'],
            ['pais' => 'Italia', 'gmt' => '+01:00'],
            ['pais' => 'Reino Unido', 'gmt' => '+00:00'],
            ['pais' => 'Australia', 'gmt' => '+10:00'],
            ['pais' => 'Canadá', 'gmt' => '-05:00'],
            ['pais' => 'China', 'gmt' => '+08:00'],
            ['pais' => 'Japón', 'gmt' => '+09:00'],
            ['pais' => 'India', 'gmt' => '+05:30'],
            ['pais' => 'Rusia', 'gmt' => '+03:00'],
            ['pais' => 'Sudáfrica', 'gmt' => '+02:00'],
            ['pais' => 'Egipto', 'gmt' => '+02:00'],
            ['pais' => 'Arabia Saudita', 'gmt' => '+03:00'],
            ['pais' => 'Emiratos Árabes Unidos', 'gmt' => '+04:00'],
            ['pais' => 'Turquía', 'gmt' => '+03:00'],
            ['pais' => 'Marruecos', 'gmt' => '+01:00'],
        ];

        foreach ($zonasHorarias as $zonaHoraria) {
            DB::table('zona_horario')->insert($zonaHoraria);
        }
    }
}
