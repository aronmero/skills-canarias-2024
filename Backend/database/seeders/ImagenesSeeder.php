<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\imagen::create([
            'salas_id' => 1,
            'ruta' => "imagenes/sala1/affair-1238428_640.jpg",
        ]);
        \App\Models\imagen::create([
            'salas_id' => 1,
            'ruta' => "imagenes/sala1/affair-1238429_640.jpg",
        ]);
        \App\Models\imagen::create([
            'salas_id' => 1,
            'ruta' => "imagenes/sala1/affair-1238434_640.jpg",
        ]);

        \App\Models\imagen::create([
            'salas_id' => 2,
            'ruta' => "imagenes/sala2/dinner-547217_640.jpg",
        ]);
        \App\Models\imagen::create([
            'salas_id' => 2,
            'ruta' => "imagenes/sala2/dinner-547219_640.jpg",
        ]);
        \App\Models\imagen::create([
            'salas_id' => 3,
            'ruta' => "imagenes/sala2/banquet-2945619_640.jpg",
        ]);

        \App\Models\imagen::create([
            'salas_id' => 3,
            'ruta' => "imagenes/sala3/banquet-2945619_640.jpg",
        ]);
        \App\Models\imagen::create([
            'salas_id' => 4,
            'ruta' => "imagenes/sala4/events-2609526_640.jpg",
        ]);

        \App\Models\imagen::create([
            'salas_id' => 5,
            'ruta' => "imagenes/sala5/table-188980_640.jpg",
        ]);
        \App\Models\imagen::create([
            'salas_id' => 5,
            'ruta' => "imagenes/sala5/table-188982_640.jpg",
        ]);

        \App\Models\imagen::create([
            'salas_id' => 6,
            'ruta' => "imagenes/sala6/banquet-453799_640.jpg",
        ]);
        \App\Models\imagen::create([
            'salas_id' => 7,
            'ruta' => "imagenes/sala7/party-1343043_640.jpg",
        ]);

        \App\Models\imagen::create([
            'salas_id' => 8,
            'ruta' => "imagenes/sala8/party-hall-342202_640.jpg",
        ]);

        \App\Models\imagen::create([
            'salas_id' => 9,
            'ruta' => "imagenes/sala9/wedding-4290293_640.jpg",
        ]);
    }
}
