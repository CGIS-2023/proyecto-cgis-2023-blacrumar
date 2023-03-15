<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_articulos')->insert([
            [
                'nombre' => "quirurgico",

            ],
            [
                'nombre' => "proteccion",
            ],
        ]),
    }
}
