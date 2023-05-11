<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LineaPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        DB::table('linea_pedidos')->insert([
            [
                'precio' => 12,
                'cantidad_pedida' => 1,
                'pedido_id' => 1,
                'articulo_id' => 1,

            ]
        ]);
        
    }
}
