<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Pedido;
use App\Http\Requests\StoreAuxiliarRequest;
use App\Http\Requests\UpdateAuxiliarRequest;
use App\Models\Auxiliar;
use App\Models\User;

class AuxiliarController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Auxiliar::class, 'auxiliar');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        $auxiliars = Auxiliar::paginate(25);
        return view('/auxiliars/index', ['auxiliars' => $auxiliars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auxiliars = Auxiliar::all();
        return view('/auxiliars/create', ['auxiliars' => $auxiliars]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuxiliarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuxiliarRequest $request)
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
        $auxiliar = new Auxiliar();
        $user->save();
        $auxiliar->user_id = $user->id;
        $auxiliar->save();
        session()->flash('success', 'Auxiliar creado correctamente');
        return redirect()->route('auxiliars.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auxiliar  $auxiliar
     * @return \Illuminate\Http\Response
     */
    public function show(Auxiliar $auxiliar)
    {
        $user = User::all();
        return view('auxiliars/show', ['auxiliar' => $auxiliar, 'user'=>$user]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auxiliar  $auxiliar
     * @return \Illuminate\Http\Response
     */
    public function edit(Auxiliar $auxiliar)
    {
        return view('auxiliars/edit', ['auxiliar' => $auxiliar]);
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuxiliarRequest  $request
     * @param  \App\Models\Auxiliar  $auxiliar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuxiliarRequest $request, Auxiliar $auxiliar)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',

            ]);
            $user = $auxiliar->user;
            $user->fill($request->all());
            $user->save();
            session()->flash('success', 'Auxiliar modificado correctamente.');
            return redirect()->route('auxiliars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auxiliar  $auxiliar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auxiliar $auxiliar)
    {
        {
            if($auxiliar->delete()) {
                session()->flash('success', 'Auxiliar borrado correctamente');
            }
            else{
                session()->flash('warning', 'El auxiliar no pudo borrarse.');
            }
            return redirect()->route('auxiliars.index');
        }
    }
}
