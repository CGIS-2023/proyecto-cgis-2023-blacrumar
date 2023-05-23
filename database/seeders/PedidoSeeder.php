<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedidos')->insert([
            [
                'fecha_pedido' => "21/02/22",
                'fecha_recepcion' => "9/03/22",
                'proveedor_id' =>1,
                'recepcionista_id' =>1,
                'administrador_id' => 1,
                'odontologo_id' =>1,

            ]
        ]);
    }
}
