<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Moneda; // Asegúrate de importar el modelo Moneda

class MonedaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nombre' => 'Dólar estadounidense', 'abreviatura' => 'USD'],
            ['nombre' => 'Euro', 'abreviatura' => 'EUR'],
            ['nombre' => 'Libra esterlina', 'abreviatura' => 'GBP'],
            ['nombre' => 'Yen japonés', 'abreviatura' => 'JPY'],
            ['nombre' => 'Dólar canadiense', 'abreviatura' => 'CAD'],
            ['nombre' => 'Peso argentino', 'abreviatura' => 'ARS'],
            ['nombre' => 'Peso chileno', 'abreviatura' => 'CLP'],
            ['nombre' => 'Real brasileño', 'abreviatura' => 'BRL'],
            ['nombre' => 'Boliviano', 'abreviatura' => 'BOB'],
            ['nombre' => 'Córdoba nicaragüense', 'abreviatura' => 'NIO'],
            // Agrega más monedas y abreviaturas aquí
        ];

        foreach ($data as $monedaData) {
            Moneda::create([
                'nombre' => $monedaData['nombre'],
                'abreviatura' => $monedaData['abreviatura'],
            ]);
        }
    }
}
