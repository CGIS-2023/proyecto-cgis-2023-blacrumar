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
                'tipo_articulo_id' => 1,
                'cantidad' => '30',
                'cantidad_minima' => '3',
                'unidad_medida_id' => 1,

            ],
            [
                'nombre' => "Guantes",
                'tipo_articulo_id' => 2,
                'cantidad' => '70',
                'cantidad_minima' => '20',
                'unidad_medida_id' => 2,
            ],
            [
                'nombre' => "Agujas",
                'tipo_articulo_id' => 1,
                'cantidad' => '10',
                'cantidad_minima' => '3',
                'unidad_medida_id' => 2,
            ],
        ]);
    }
}
