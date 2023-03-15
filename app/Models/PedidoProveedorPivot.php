<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PedidoProveedorPivot extends Pivot
{
   

    protected $fillable = ['id_pedido',  'nombre_empresa'];
}