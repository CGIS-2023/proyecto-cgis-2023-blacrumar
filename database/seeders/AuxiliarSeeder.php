<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuxiliarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auxiliars')->insert([
            [
                'nombre' => "María",
                'apellidos' => "Marquez",
                'DNI' => '18247500Y',
                'telefono' => '725300769',
                'email' => 'maria@correo.com',
                'user_id' => '3',

            ]
            ]);
        }
    
}
