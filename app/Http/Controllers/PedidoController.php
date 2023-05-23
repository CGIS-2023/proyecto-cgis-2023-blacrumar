<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Models\Pedido;
use App\Models\Proveedor;
use App\Models\LineaPedido;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PedidoController extends Controller
{ 
    /*
    public function __construct()
    {
        $this->authorizeResource(Pedido::class, 'pedido');
    }
    */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::query()
            ->when(request('busqueda'), function($query){
                return $query->where('fecha_pedido', 'like', '%' . request('busqueda') . '%');
            })
        
        ->paginate(25); 
        return view('/pedidos/index', ['pedidos' => $pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedors = Proveedor::all();
        $lineaPedidos = LineaPedido::all();
        
        
        return view('pedidos/create', ['proveedors' => $proveedors, 'lineaPedidos' => $lineaPedidos]);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePedidoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePedidoRequest $request)
    {
        $this->validate($request, [
            'fecha_pedido' => 'required|date',
            'fecha_recepcion' => 'required|date',
            'proveedor_id' => 'required|numeric',
            
        ]);

        $pedido = new Pedido($request->all());
        $pedido->administrador_id = Auth::user()->administrador()->exists() ? Auth::user()->administrador->id : null;
        $pedido->odontologo_id = Auth::user()->odontologo_id ? Auth::user()->odontologo->id : null;
        //$pedido->user_id = Auth::user()->exists() ? Auth::user()->user_id : null;
        //dd($pedido->user_id = Auth::user()->exists() ? Auth::user()->user_id : null);
        $pedido->save();
        session()->flash('success', 'Pedido creado correctamente.');
        return redirect()->route('pedidos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $proveedors = Proveedor::all();
        $lineaPedidos = LineaPedido::all();
        $users = User::all();
        return view('pedidos/edit', ['pedido'=> $pedido, 'proveedors' => $proveedors, 'lineaPedidos' => $lineaPedidos, 'users' => $users]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePedidoRequest  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePedidoRequest $request, Pedido $pedido)
    {
        $this->validate($request, [
            'fecha_pedido' => 'required|date',
            'fecha_recepcion' => 'required|date',
            'user_id' => 'numeric',
            'proveedor_id' => 'required|numeric',
        ]);
        $pedido -> fill($request->all());
        $pedido->save();
        session()->flash('success', 'Pedido modificado correctamente.');
        return redirect()->route('pedidos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        if($pedido->delete()){
            session()->flash('success', 'Pedido borrado correctamente');
        }
        else{
            session()->flash('warning', 'No pudo borrarse el pedido');
        }
        return redirect()->route('pedidos.index');
    }
}
