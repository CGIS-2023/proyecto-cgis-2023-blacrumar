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

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $tipo_usuario_id = intval($request->tipo_usuario_id);
        if($tipo_usuario_id == 1){
            //Odontologo
            $reglas_admin = ['fecha_contratacion' => 'required|date',
                'vacunado' => 'required|boolean',
                'sueldo' => 'required|numeric',
                
            ];
            $rules = array_merge($reglas_medico, $rules);
        }
        elseif($tipo_usuario_id == 2){
            //Auxiliar
            $reglas_auxiliar = ['nuhsa' => ['required', 'string', 'max:12', 'min:12', new Nuhsa()]];
            $rules = array_merge($reglas_auxiliar, $rules);
        }
        elseif($tipo_usuario_id == 3){
            //Recepcionista
            $reglas_recepcionista = ['nuhsa' => ['required', 'string', 'max:12', 'min:12', new Nuhsa()]];
            $rules = array_merge($reglas_recepcionista, $rules);
        }
        $request->validate($rules);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($tipo_usuario_id == 1) {
            //Odontologo
            $odontologo = new Odontologo($request->all());
            $odontologo->user_id = $user->id;
            $odontologo->save();
        }
        elseif($tipo_usuario_id == 2){
            //Auxiliar
            $auxiliar = new Auxiliar($request->all());
            $auxiliar->user_id = $user->id;
            $auxiliar->save();
        }
        elseif($tipo_usuario_id == 3){
            //Recepcionista
            $recepcionista = new Recepcionista($request->all());
            $recepcionista->user_id = $user->id;
            $recepcionista->save();
        }

        




        $user->fresh();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
