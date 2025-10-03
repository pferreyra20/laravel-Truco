<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        Usuario::create([
            'id_permiso' => 1,
            'nombre' => 'Admin',
            'password' => bcrypt('penaipet'),
        ]);
    }
}
