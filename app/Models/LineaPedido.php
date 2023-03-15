<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaPedido extends Model
{
    use HasFactory;

    protected $fillable = ['id_articulo', 'precio', 'cantidad'];

    public function articulo(){
        return $this->hasOne(Articulo::class);
    }

    public function pedido(){
        return $this->hasOne(Pedido::class);
    }
}
