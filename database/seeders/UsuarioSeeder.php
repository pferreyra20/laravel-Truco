<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            'id_permiso' => 1,
            'nombre' => 'Administrador',
            'email' => 'admin@ejemplo.com',
            'password' => Hash::make('penamachos'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
