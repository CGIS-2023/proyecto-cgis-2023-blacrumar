<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['id_pedido', 'fecha_pedido', 'fecha_recepcion', 'cantidad', 'id_articulo'];

    protected $casts = [
        'fecha_pedido' => 'datetime:d-m-Y',
        'fecha_recepcion' => 'datetime:d-m-Y'
    ];

    public function lineaPedidos(){
        return $this->hasOne(LineaPedido::class)
    }

    public function trabajador(){
        return $this->hasOne(Trabajador::class);
    }

    public function proveedors(){
        return $this->belongsToMany(Proveedor::class)->using(PedidoProveedorPivot::class)->withPivot('nombre_medicamento', 'nombre_empresa', 'cantidad');
    }
}
