<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\sala::create([
            'nombre' => 'Carpa Jilorio',
            'aforo' => 102,
            'minimo' => 70
        ]);
        \App\Models\sala::create([
            'nombre' => 'Salón Sancocho',
            'aforo' => 62,
            'minimo' => 50,
        ]);
        \App\Models\sala::create([
            'nombre' => 'Terraza Solajero',
            'aforo' => 56,
            'minimo' => 40,
        ]);
        \App\Models\sala::create([
            'nombre' => 'Pabellón Chascar',
            'aforo' => 64,
            'minimo' => 46,
        ]);
        \App\Models\sala::create([
            'nombre' => 'Jardín Abollao',
            'aforo' => 116,
            'minimo' => 80,
        ]);
        \App\Models\sala::create([
            'nombre' => 'Recinto Belingo',
            'aforo' => 260,
            'minimo' => 140,
        ]);
        \App\Models\sala::create([
            'nombre' => 'Sala Empalicar',
            'aforo' => 54,
            'minimo' => 38,
        ]);
        \App\Models\sala::create([
            'nombre' => 'Zagúan Enyugar',
            'aforo' => 144,
            'minimo' => 100,
        ]);
        \App\Models\sala::create([
            'nombre' => 'Palacio Canchanchán',
            'aforo' => 200,
            'minimo' => 120,
        ]);
    }
}
