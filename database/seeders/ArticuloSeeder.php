<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'tipo_articulo_id' => null,
                'cantidad' => '30',
                'cantidadMinima' => '3',
                'unidadMedida' => 'null',

            ],
            [
                'nombre' => "Guantes",
                'tipo_articulo_id' => null,
                'cantidad' => '70',
                'cantidadMinima' => '20',
                'unidadMedida' => 'null',
            ],
            [
                'nombre' => "Agujas",
                'tipo_articulo_id' => null,
                'cantidad' => '10',
                'cantidadMinima' => '3',
                'unidadMedida' => 'null',
            ],
        ]);
    }
}
