<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nombre' => "Óscar",
                'apellido' => "Ramirez",
                'email' => "administrador@administrador.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'nombre' => "Martín",
                'apellido' => "Romero",
                'email' => "odontologo@odontologo.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'nombre' => "Lucía",
                'apellido' => "Martínez",
                'email' => "auxiliar@auxiliar.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'nombre' => "María",
                'apellido' => "Casado",
                'email' => "recepcionista@recepcionista.com",
                'password' => Hash::make('12345678'),
            ],
            
        ]);
    }
}