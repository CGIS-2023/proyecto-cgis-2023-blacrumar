<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'direccion', 'telefono', 'email', 'web'];

    public function articulos(){
        return $this->belongsToMany(Articulo::class)->withPivot('precio');
    }
}
