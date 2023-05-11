<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecepcionistaRequest;
use App\Http\Requests\UpdateRecepcionistaRequest;
use App\Models\Recepcionista;

class RecepcionistaController extends Controller
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
     * @param  \App\Http\Requests\StoreRecepcionistaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecepcionistaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recepcionista  $recepcionista
     * @return \Illuminate\Http\Response
     */
    public function show(Recepcionista $recepcionista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recepcionista  $recepcionista
     * @return \Illuminate\Http\Response
     */
    public function edit(Recepcionista $recepcionista)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recepcionista  $recepcionista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recepcionista $recepcionista)
    {
        //
    }
}
