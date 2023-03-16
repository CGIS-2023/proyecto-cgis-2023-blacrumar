<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnidadMedidaRequest;
use App\Http\Requests\UpdateUnidadMedidaRequest;
use App\Models\UnidadMedida;

class UnidadMedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidadMedidas = UnidadMedida::paginate(25);
        return view('/unidadMedidas/index', ['unidadMedidas' => $unidadMedidas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoArticulos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUnidadMedidaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnidadMedidaRequest $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255'
        ]);
        $unidadMedida = new UnidadMedida($request->all());
        $unidadMedida->save();
        session()->flash('success', 'UnidadMedida creada correctamente');
        return redirect()->route('unidadMedidas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnidadMedida  $unidadMedida
     * @return \Illuminate\Http\Response
     */
    public function show(UnidadMedida $unidadMedida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnidadMedida  $unidadMedida
     * @return \Illuminate\Http\Response
     */
    public function edit(UnidadMedida $unidadMedida)
    {
        return view('unidadMedidas/edit', ['unidadMedida' => $unidadMedida]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnidadMedidaRequest  $request
     * @param  \App\Models\UnidadMedida  $unidadMedida
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnidadMedidaRequest $request, UnidadMedida $unidadMedida)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255'
        ]);
        $unidadMedida->fill($request->all());
        $unidadMedida->save();
        session()->flash('success', 'unidadMedida modificado correctamente');
        return redirect()->route('unidadMedidas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnidadMedida  $unidadMedida
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnidadMedida $unidadMedida)
    {
        if($unidadMedida->delete()){
            session()->flash('success', 'unidadMedida borrada correctamente');
        }
        else{
            session()->flash('warning', 'No pudo borrarse la unidadMedida');
        }
        return redirect()->route('unidadMedidas.index');
    }
}
