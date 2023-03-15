<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable = ['empresa', 'direccion', 'telefono', 'email', 'paginaWeb'];

    public function articulos(){
        return $this->belongsToMany(Articulo::class)->using(ArticuloProveedorPivot::class)->withPivot('nombre_articulo', 'nombre_empresa');
    }

    public function pedidos(){
        return $this->belongsToMany(Pedido::class)->using(PedidoProveedorPivot::class)->withPivot('nombre_articulo', 'nombre_empresa');
    }
}
