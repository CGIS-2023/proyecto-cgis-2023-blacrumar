<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TipoArticuloSeeder::class, UnidadMedidaSeeder::class, UserSeeder::class, ArticuloSeeder::class, ProveedorSeeder::class, OdontologoSeeder::class, AuxiliarSeeder::class, RecepcionistaSeeder::class, AdministradorSeeder::class, PedidoSeeder::class, LineaPedidoSeeder::class,
        ]);
    }
}
