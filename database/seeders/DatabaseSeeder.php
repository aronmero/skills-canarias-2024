<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        \App\Models\User::factory()->create([
            'nombre' => 'Admin',
            'email' => 'admin@example.com',
        ])->assignRole('Administrador');;
        \App\Models\User::factory(10)->create();

        $this->call(SalaSeeder::class);
       
        $this->call(ImagenesSeeder::class);

        \App\Models\evento::factory(10)->create();
        \App\Models\reserva::factory(10)->create();
    }
}
