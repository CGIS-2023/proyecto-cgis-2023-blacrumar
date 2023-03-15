<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoArticuloRequest;
use App\Http\Requests\UpdateTipoArticuloRequest;
use App\Models\TipoArticulo;

class TipoArticuloController extends Controller
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
     * @param  \App\Http\Requests\StoreTipoArticuloRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoArticuloRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoArticulo  $tipoArticulo
     * @return \Illuminate\Http\Response
     */
    public function show(TipoArticulo $tipoArticulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoArticulo  $tipoArticulo
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoArticulo $tipoArticulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoArticuloRequest  $request
     * @param  \App\Models\TipoArticulo  $tipoArticulo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoArticuloRequest $request, TipoArticulo $tipoArticulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoArticulo  $tipoArticulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoArticulo $tipoArticulo)
    {
        //
    }
}
