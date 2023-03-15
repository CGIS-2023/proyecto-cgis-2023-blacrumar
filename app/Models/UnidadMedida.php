<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function Articulos(){
        return $this->hasOne(Articulo::class);
        
    }
}
