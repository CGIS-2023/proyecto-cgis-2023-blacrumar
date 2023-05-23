<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function administrador()
    {
        return $this->hasOne(Administrador::class);
    }

    public function odontologo()
    {
        return $this->hasOne(Odontologo::class);
    }

    public function auxiliar()
    {
        return $this->hasOne(Auxiliar::class);
    }

    public function recepcionista()
    {
        return $this->hasOne(Recepcionista::class);
    }

    public function getTipoUsuarioIdAttribute(){
        if ($this->administrador()->exists()){
            return 1;
        }
        elseif($this->odontologo()->exists()){
            return 2;
        }
        elseif($this->auxiliar()->exists()){
            return 3;
        }
        elseif($this->recepcionista()->exists()){
            return 4;
        }
        else{
            return 5;
        }
    }

    public function getTipoUsuarioAttribute(){
        $tipos_usuario = [1 => trans('Administrador'), 2 => trans('Odontólogo'), 3 => trans('Auxiliar'), 4 => trans('Recepcionista')];
        return $tipos_usuario[$this->tipo_usuario_id];
    }
}
