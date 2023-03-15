<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLineaPedidoRequest;
use App\Http\Requests\UpdateLineaPedidoRequest;
use App\Models\LineaPedido;

class LineaPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLineaPedidoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLineaPedidoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LineaPedido  $lineaPedido
     * @return \Illuminate\Http\Response
     */
    public function show(LineaPedido $lineaPedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LineaPedido  $lineaPedido
     * @return \Illuminate\Http\Response
     */
    public function edit(LineaPedido $lineaPedido)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LineaPedido  $lineaPedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(LineaPedido $lineaPedido)
    {
        //
    }
}
