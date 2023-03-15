<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellidos', 'DNI', 'telefono', 'email', 'constraseña'];

    public function articulo(){
        return $this->belongsTo(Articulo::class);
    }

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }
}
