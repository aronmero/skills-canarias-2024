<?php

namespace Database\Factories;

use App\Models\evento;
use App\Models\sala;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\reserva>
 */
class reservaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $evento = evento::inRandomOrder()->first();
        $valid=false;
        while(!$valid){
            $sala = sala::inRandomOrder()->first();
            if( $sala->aforo>=$evento->comensales){
                $valid=true;
            }
        }

        return [
            'fecha' => $evento->fecha,
            'eventos_id' => $evento->id,
            'salas_id' => $sala->id
        ];
    }
}
