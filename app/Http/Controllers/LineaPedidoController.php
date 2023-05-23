<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLineaPedidoRequest;
use App\Http\Requests\UpdateLineaPedidoRequest;
use App\Models\LineaPedido;
use App\Models\Articulo;
use App\Models\Pedido;

class LineaPedidoController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(LineaPedido::class, 'lineaPedido');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lineaPedidos = lineaPedido::paginate(25); 
        return view('/lineaPedidos/index', ['lineaPedidos' => $lineaPedidos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articulos = Articulo::all();
        $pedidos = Pedido::all();
        return view('lineaPedidos/create', ['articulos' => $articulos, 'pedidos' => $pedidos]);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLineaPedidoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLineaPedidoRequest $request)
    {
        $this->validate($request, [
            'precio' => 'required|numeric|min:0',
            'cantidad_pedida' => 'required|numeric|min:0',
            'pedido_id' => 'required|numeric',
            'articulo_id' => 'required|numeric'
        
        ]);
        $lineaPedido = new LineaPedido($request->all());
        $lineaPedido->save();
        session()->flash('success', 'Linea Pedido creada correctamente.');
        return redirect()->route('lineaPedido.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LineaPedido  $lineaPedido
     * @return \Illuminate\Http\Response
     */
    public function show(LineaPedido $lineaPedido)
    {
        $pedidos = Pedido::all();
        $articulos = Articulo::all();
        return view('lineaPedidos/show', ['lineaPedido' => $lineaPedido, 'pedidos' => $pedidos, 'articulos' => $articulos]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LineaPedido  $lineaPedido
     * @return \Illuminate\Http\Response
     */
    public function edit(LineaPedido $lineaPedido)
    {
        $pedidos = Pedido::all();
        $articulos = Articulo::all();
        return view('lineaPedidos/edit', ['lineaPedido' => $lineaPedido, 'pedidos' => $pedidos, 'articulos' => $articulos]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLineaPedidoRequest  $request
     * @param  \App\Models\LineaPedido  $lineaPedido
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLineaPedidoRequest $request, LineaPedido $lineaPedido)
    {
        $this->validate($request, [
            'precio' => 'required|numeric|min:0',
            'cantidad_pedida' => 'required|numeric|min:0',
            'pedido_id' => 'required|numeric',
            'articulo_id' => 'required|numeric'
        
        ]);
        $lineaPedido = fill($request->all());
        $lineaPedido->save();
        session()->flash('success', 'Linea Pedido modificada correctamente.');
        return redirect()->route('lineaPedido.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LineaPedido  $lineaPedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(LineaPedido $lineaPedido)
    {
        if($lineaPedido->delete()){
            session()->flash('success', 'Linea Pedido borrada correctamente');
        }
        else{
            session()->flash('warning', 'No pudo borrarse la linea pedido');
        }
        return redirect()->route('lineaPedidos.index');
    }
}
