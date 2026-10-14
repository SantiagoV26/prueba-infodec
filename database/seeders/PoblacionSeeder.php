<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pais;
use App\Models\Ciudad;

class PoblacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Inserta países y ciudades en la base de datos
     */
    public function run(): void
    {
        // 1. Crear país 
        $colombia = Pais::create([
            'nombre' => 'Colombia',
            'idioma' => 'Español'
        ]);

        // 1.2 Crear ciudades asociadas al país
        Ciudad::create([
            'pais_id' => $colombia->id, 'nombre' => 'Bogotá', 'poblacion' => 2000000
        ]);

        Ciudad::create([
            'pais_id' => $colombia->id, 'nombre' => 'Medellín', 'poblacion' => 1500000
        ]);

        Ciudad::create([
            'pais_id' => $colombia->id, 'nombre' => 'Cali', 'poblacion' => 1400000
        ]);

        Ciudad::create([
            'pais_id' => $colombia->id, 'nombre' => 'Barranquilla', 'poblacion' => 1200000
        ]);

        // 2. Crear otro país
        $japon = Pais::create([
            'nombre' => 'Japón',
            'idioma' => 'Japonés'
        ]);

        // 2.2 Crear ciudades asociadas al país
        Ciudad::create([
            'pais_id' => $japon->id, 'nombre' => 'Tokio', 'poblacion' => 9000000
        ]);

        Ciudad::create([
            'pais_id' => $japon->id, 'nombre' => 'Osaka', 'poblacion' => 2700000
        ]);

    }
}
