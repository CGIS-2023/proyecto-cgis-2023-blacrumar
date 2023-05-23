<?php

namespace App\Policies;

use App\Models\Administrador;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Http\Controllers\Request;
use App\Policies\Auth;


class AdministradorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->tipo_usuario_id == 1;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Administrador $administrador)
    {
        return $user->tipo_usuario_id == 1;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->tipo_usuario_id == 1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Administrador $administrador)
    {
        return $user->tipo_usuario_id == 1;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Administrador $administrador)
    {
        /*
        if(Auth::user()->administrador_id == $administrador->id){
            return "No puedes eliminarte a tí mismo";
        }
        else {
            return view('administrador/index', ['administrador' => Auth::user()->administrador]);
        }
        */
        return Auth::user()->administrador()->exists() ? Auth::user()->administrador->id : null;
        //$user->tipo_usuario_id == 1 || ($administrador->tipo_usuario_id == $user->tipo_usuario->id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Administrador $administrador)
    {
        return $user->tipo_usuario_id == 1;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Administrador $administrador)
    {
        //
    }
}
