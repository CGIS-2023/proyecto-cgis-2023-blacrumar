<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proveedors')->insert([
            [
                'nombre' => "empresa1",
                'direccion' => "calle 1",
                'telefono' => "666666666",
                'email' => "empresa1@empresa.com",
                'web' => "www.empresa1.es",
            ],
            [
                'nombre' => "empresa2",
                'direccion' => "calle 2",
                'telefono' => "777777777",
                'email' => "empresa2@empresa.com",
                'web' => "www.empresa2.es",
            ]
        ])
    }
}
