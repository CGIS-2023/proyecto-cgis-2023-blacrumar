<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'tipo_articulo_id', 'cantidad', 'unidad_medida_id', 'cantidad_minima'];



    public function lineaPedido(){
        return $this->hasMany(LineaPedido::class);
    }

    /*
    public function proveedors(){
        return $this->belongsToMany(Proveedor::class)->using(ArticuloProveedorPivot::class)->withPivot('nombre_articulo', 'nombre_empresa');
    }
    */

    public function unidadMedida(){
        return $this->belongsTo(UnidadMedida::class);
    }

    public function tipoArticulo(){
        return $this->belongsTo(TipoArticulo::class);
    }

    public function proveedors(){
        return $this->belongsToMany(Proveedor::class)->withPivot('precio');
    }


    public function getEstaBajoStockAttribute(){
        if ($this->cantidad_minima < $this->cantidad){
            return false;
        }
        return true;
    }
    


}
