<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['fecha_pedido','fecha_recepcion', 'proveedor_id'];

    protected $casts = [
        'fecha_pedido' => 'date:d-m-Y',
        'fecha_recepcion' => 'date:d-m-Y'
    ];
    

    public function lineaPedido(){
        return $this->hasMany(LineaPedido::class);
    }

    public function proveedor(){
        return $this->hasOne(Proveedor::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }

    /*
    public function administrador(){
        return $this->hasOne(Administrador::class);
    }

    public function recepcionista(){
        return $this->hasOne(Recepcionista::class);
    }

    */
}
