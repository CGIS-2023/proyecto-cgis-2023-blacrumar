<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('linea_pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('precio');
            $table->integer('cantidad_pedida');
            $table->foreignId('pedido_id')->constrained();
            $table->foreignId('articulo_id')->constrained();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linea_pedidos');
    }
};
