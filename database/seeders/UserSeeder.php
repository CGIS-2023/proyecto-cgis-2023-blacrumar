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
                'name' => "Administrador",
                'email' => "administrador@administrador.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Odontólogo",
                'email' => "odontologo@odontologo.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Auxiliar",
                'email' => "auxiliar@auxiliar.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Recepcionista",
                'email' => "recepcionista@recepcionista.com",
                'password' => Hash::make('12345678'),
            ],
            
        ]);
    }
}