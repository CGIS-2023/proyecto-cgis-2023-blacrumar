<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administradors')->insert([
            [
            'nombre' => "Miguel",
            'apellidos' => "Pontes",
            'DNI' => '269146710K',
            'telefono' => '619253909',
            'email' => 'miguel@correo.com',
            'user_id' => '1',
            ]
            ]);
    }
}
