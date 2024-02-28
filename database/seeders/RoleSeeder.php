<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'Administrador']);
        $usuario = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'admin.usuarios.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.eventos.index'])->syncRoles([$admin, $usuario]);
        Permission::create(['name' => 'admin.eventos.store'])->syncRoles([$admin, $usuario]);
        Permission::create(['name' => 'admin.eventos.show'])->syncRoles([$admin, $usuario]);
        Permission::create(['name' => 'admin.eventos.update'])->syncRoles([$admin, $usuario]);
        Permission::create(['name' => 'admin.eventos.destroy'])->syncRoles([$admin, $usuario]);

        Permission::create(['name' => 'admin.reservas.index'])->syncRoles([$admin, $usuario]);
        Permission::create(['name' => 'admin.reservas.store'])->syncRoles([$admin, $usuario]);
        Permission::create(['name' => 'admin.reservas.show'])->syncRoles([$admin, $usuario]);
        Permission::create(['name' => 'admin.reservas.update'])->syncRoles([$admin, $usuario]);
        Permission::create(['name' => 'admin.reservas.destroy'])->syncRoles([$admin, $usuario]);
 
    }
}
