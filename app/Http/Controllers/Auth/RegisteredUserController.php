<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function create_odontologo(){
        return view('auth.register-odontologo');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' =>'required|string|confirmed|min:8',
        ];

        $tipo_usuario_id = intval($request->tipo_usuario_id);
        if($tipo_usuario_id == 1){
            //Administrador
            $reglas_admin = ['nombre' => 'required|string',
                'apellidos' => 'required|string',
                'DNI' => 'required|string',
                'telefono' => 'required|string',
                'email' => 'required|string',                
            ];
            $rules = array_merge($reglas_admin, $rules);
        }
        elseif($tipo_usuario_id == 2){
            //Odontologo
            $reglas_odontologo = ['nombre' => 'required|string',
            'apellidos' => 'required|string',
            'DNI' => 'required|string',
            'telefono' => 'required|string',
            'email' => 'required|string',
            ];
            $rules = array_merge($reglas_odontologo, $rules);
        }
        elseif($tipo_usuario_id == 3){
            //Auxiliar
            $reglas_auxiliar = ['nombre' => 'required|string',
            'apellidos' => 'required|string',
            'DNI' => 'required|string',
            'telefono' => 'required|string',
            'email' => 'required|string',                
            ];
            $rules = array_merge($reglas_auxiliar, $rules);
        }
        elseif($tipo_usuario_id == 4){
            //Recepcionista
            $reglas_recepcionistar = ['nombre' => 'required|string',
            'apellidos' => 'required|string',
            'DNI' => 'required|string',
            'telefono' => 'required|string',
            'email' => 'required|string',                
            ];
            $rules = array_merge($reglas_recepcionistar, $rules);
        }


        $request->validate($rules);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($tipo_usuario_id == 1) {
            //Administrador
            $administrador = new Administrador($request->all());
            $administrador->user_id = $user->id;
            $administrador->save();
        }
        elseif($tipo_usuario_id == 2){
         //Odontologo
         $odontologo = new Odontologo($request->all());
         $odontologo->user_id = $user->id;
         $odontologo->save();
        }
        elseif($tipo_usuario_id == 3){
            //Auxiliar
            $auxiliar = new Auxiliar($request->all());
            $auxiliar->user_id = $user->id;
            $auxiliar->save();
        }
        elseif($tipo_usuario_id == 4){
            //Recepcionista
            $recepcionista = new Recepcionista($request->all());
            $recepcionista->user_id = $user->id;
            $recepcionista->save();
        }

        $user->fresh();
        Auth::login($user);
        event(new Registered($user));
        return redirect(RouteServiceProvider::HOME);
    }
}
