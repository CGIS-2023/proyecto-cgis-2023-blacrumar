<?php

namespace App\Http\Controllers;

use App\Policies\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pedido;
use App\Http\Requests\StoreAdministradorRequest;
use App\Http\Requests\UpdateAdministradorRequest;
use App\Models\Administrador;
use App\Models\User;

class AdministradorController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Administrador::class, 'administrador');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        $administradors = Administrador::paginate(25);
        return view('/administradors/index', ['administradors' => $administradors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $administradors = Administrador::all();
        return view('/administradors/create', ['administradors' => $administradors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdministradorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdministradorRequest $request)
    {
        $this->validate($request,[
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);
        $user = User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $administrador = new Administrador();
        $user->save();
        $administrador->user_id = $user->id;
        $administrador->save();
        session()->flash('success', 'Administrador creado correctamente');
        return redirect()->route('administradors.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function show(Administrador $administrador)
    {
        $user = User::all();
        return view('administradors/show', ['administrador' => $administrador, 'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrador $administrador)
    {
        return view('administradors/edit', ['administrador' => $administrador]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdministradorRequest  $request
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdministradorRequest $request, Administrador $administrador)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',

            ]);
            $user = $administrador->user;
            $user->fill($request->all());
            $user->save();
            session()->flash('success', 'Administrador modificado correctamente.');
            return redirect()->route('administradors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrador $administrador)
    {
        {
            if($administrador->delete()) {
                session()->flash('success', 'Administrador borrado correctamente');
            }
            else{
                session()->flash('warning', 'El administrador no pudo borrarse.');
            }
            return redirect()->route('administradors.index');
        }
    }
}
