<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Proveedor;

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
            ],
        ]);
        $proveedor1 = Proveedor::find(1);
        $proveedor1->articulos()->attach(1, ['precio' => 132.0]);
    }
}
