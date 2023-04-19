<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auxiliar extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellidos', 'DNI', 'telefono', 'email'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
