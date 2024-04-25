<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\evento>
 */
class eventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usuario = User::inRandomOrder()->first();
        $date = $this->faker->dateTimeBetween('now', '+14 days');
        return [
            'nombre' => fake()->text(30),
            'comensales' => fake()->numberBetween(12, 90),
            'fecha' => $date,
            'usuario_id' => $usuario->id
        ];
    }
}
