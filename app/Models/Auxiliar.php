<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Auxiliar extends Model
{
    use HasFactory, softDeletes;

    //protected $fillable = ['nombre', 'apellidos', 'DNI', 'telefono', 'email'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }

}
