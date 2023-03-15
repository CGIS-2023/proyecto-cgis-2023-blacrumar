<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articulos')->insert([
            [
                'nombre' => "Mascarillas",
                'tipo' => null,
                'cantidad' => '30',
                'cantidadMinima' => '3',
                'unidadMedida' => null,

            ],
            [
                'nombre' => "Guantes",
                'tipo' => null,
                'cantidad' => '70',
                'cantidadMinima' => '20',
                'unidadMedida' => null,
            ],
            [
                'nombre' => "Agujas",
                'tipo' => null,
                'cantidad' => '10',
                'cantidadMinima' => '3',
                'unidadMedida' => null,
            ],
        ]),
    }
}
