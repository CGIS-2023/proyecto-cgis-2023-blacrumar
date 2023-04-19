<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuxiliarRequest;
use App\Http\Requests\UpdateAuxiliarRequest;
use App\Models\Auxiliar;

class AuxiliarController extends Controller
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
     * @param  \App\Http\Requests\StoreAuxiliarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuxiliarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auxiliar  $auxiliar
     * @return \Illuminate\Http\Response
     */
    public function show(Auxiliar $auxiliar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auxiliar  $auxiliar
     * @return \Illuminate\Http\Response
     */
    public function edit(Auxiliar $auxiliar)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auxiliar  $auxiliar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auxiliar $auxiliar)
    {
        //
    }
}
