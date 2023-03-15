<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = ['id_articulo', 'nombre', 'tipo', 'cantidad', 'unidadMedida', 'cantidadMinima'];

    //CÓMO SE HACE REFERENCIA A UNIDADMEDIDA Y TIPO

    public function trabajador(){
        return $this->hasOne(Trabajador::class);
    }

    public function lineaPedido(){
        return $this->hasOne(LineaPedido::class);
    }

    public function proveedors(){
        return $this->belongsToMany(Proveedor::class)->using(ArticuloProveedorPivot::class)->withPivot('nombre_articulo', 'nombre_empresa');
    }
}
