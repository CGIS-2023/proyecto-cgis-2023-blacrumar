<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecepcionistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recepcionistas')->insert([
            [
                'nombre' => "Inma",
                'apellidos' => "Rodríguez",
                'DNI' => '18263840P',
                'telefono' => '629402736',
                'email' => 'inma@correo.com',
                'user_id' => "4"

            ]
            ]);
    }
    
}
