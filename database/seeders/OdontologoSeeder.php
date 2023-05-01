<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OdontologoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('odontologos')->insert([
            [
                'nombre' => "Sergio",
                'apellidos' => "Díaz",
                'DNI' => "32938040L",
                'telefono' => "623683048",
                'email' => "sergio@correo.com",
                'user_id' => '2'

            ]
            ]);
         
    }
}
