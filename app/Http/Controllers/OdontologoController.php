<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Pedido;
use App\Models\Proveedor;
use App\Http\Requests\StoreOdontologoRequest;
use App\Http\Requests\UpdateOdontologoRequest;
use App\Models\Odontologo;
use App\Models\User;

class OdontologoController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Odontologo::class, 'odontologo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        $odontologos = Odontologo::paginate(25);
        return view('/odontologos/index', ['odontologos' => $odontologos]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $odontologos = Odontologo::all();
        return view('/odontologos/create', ['odontologos' => $odontologos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOdontologoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOdontologoRequest $request)
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
        $odontologo = new Odontologo();
        $user->save();
        $odontologo->user_id = $user->id;
        $odontologo->save();
        session()->flash('success', 'Odontologo creado correctamente');
        return redirect()->route('odontologos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Odontologo  $odontologo
     * @return \Illuminate\Http\Response
     */
    public function show(Odontologo $odontologo)
    {
        $user = User::all();
        return view('odontologos/show', ['odontologo' => $odontologo, 'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Odontologo  $odontologo
     * @return \Illuminate\Http\Response
     */
    public function edit(Odontologo $odontologo)
    {
        return view('odontologos/edit', ['odontologo' => $odontologo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOdontologoRequest  $request
     * @param  \App\Models\Odontologo  $odontologo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOdontologoRequest $request, Odontologo $odontologo)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',

            ]);
            $user = $odontologo->user;
            $user->fill($request->all());
            $user->save();
            session()->flash('success', 'Odontologo modificado correctamente.');
            return redirect()->route('odontologos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Odontologo  $odontologo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Odontologo $odontologo)
    {
        {
            if($odontologo->delete()) {
                session()->flash('success', 'Odontologo borrado correctamente');
            }
            else{
                session()->flash('warning', 'El odontologo no pudo borrarse.');
            }
            return redirect()->route('odontologos.index');
        }
    }
}
