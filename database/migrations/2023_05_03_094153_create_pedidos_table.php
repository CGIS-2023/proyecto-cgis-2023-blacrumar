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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_pedido');
            $table->date('fecha_recepcion');
            $table->foreignId('proveedor_id')->constrained()->onDelete('cascade');
            $table->foreignId('recepcionista_id')->constrained()->onDelte('cascade');
            $table->foreignId('administrador_id')->cosntrained()->onDelete('cascade');
            $table->foreignId('odontologo_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('pedidos');
    }
};
