<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use App\Models\Pedido;
use App\Http\Requests\StoreRecepcionistaRequest;
use App\Http\Requests\UpdateRecepcionistaRequest;
use App\Models\Recepcionista;
use App\Models\User;

class RecepcionistaController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Recepcionista::class, 'recepcionista');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        $recepcionistas = Recepcionista::paginate(25);
        return view('/recepcionistas/index', ['recepcionistas' => $recepcionistas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recepcionistas = Recepcionista::all();
        return view('/recepcionistas/create', ['recepcionistas' => $recepcionistas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRecepcionistaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecepcionistaRequest $request)
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
        $recepcionista = new Recepcionista();
        $user->save();
        $recepcionista->user_id = $user->id;
        $recepcionista->save();
        session()->flash('success', 'Recepcionista creado correctamente');
        return redirect()->route('recepcionistas.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recepcionista  $recepcionista
     * @return \Illuminate\Http\Response
     */
    public function show(Recepcionista $recepcionista)
    {
        $user = User::all();
        return view('recepcionistas/show', ['recepcionista' => $recepcionista, 'user'=>$user]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recepcionista  $recepcionista
     * @return \Illuminate\Http\Response
     */
    public function edit(Recepcionista $recepcionista)
    {
        return view('recepcionistas/edit', ['recepcionista' => $recepcionista]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecepcionistaRequest  $request
     * @param  \App\Models\Recepcionista  $recepcionista
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecepcionistaRequest $request, Recepcionista $recepcionista)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',

            ]);
            $user = $recepcionista->user;
            $user->fill($request->all());
            $user->save();
            session()->flash('success', 'Recepcionista modificado correctamente.');
            return redirect()->route('recepcionistas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recepcionista  $recepcionista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recepcionista $recepcionista)
    {
        {
            if($recepcionista->delete()) {
                session()->flash('success', 'Recepcionista borrado correctamente');
            }
            else{
                session()->flash('warning', 'El recepcionista no pudo borrarse.');
            }
            return redirect()->route('recepcionistas.index');
        }
    }
}
