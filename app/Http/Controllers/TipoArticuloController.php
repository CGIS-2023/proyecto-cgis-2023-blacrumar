<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoArticuloRequest;
use App\Http\Requests\UpdateTipoArticuloRequest;
use App\Models\TipoArticulo;

class TipoArticuloController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(TipoArticulo::class, 'tipoArticulo');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoArticulos = TipoArticulo::paginate(25);
        return view('/tipoArticulos/index',['tipoArticulos' => $tipoArticulos]);
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
     * @param  \App\Http\Requests\StoreTipoArticuloRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoArticuloRequest $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255'
        ]);
        $tipoArticulo = new tipoArticulo($request->all());
        $tipoArticulo->save();
        session()->flash('success','TipoArticulo creado correctamente');
        return redirect()->route('tipoArticulos.index');
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
        return view('tipoArticulos/edit', ['tipoArticulo' => $tipoArticulo]);
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
        $this->validate($request, [
            'nombre' => 'required|string|max:255'
        ]);
        $tipoArticulo->fill($request->all());
        $tipoArticulo->save();
        session()->flash('success', 'TipoArticulo modificado correctamente');
        return redirect()->route('tipoArticulos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoArticulo  $tipoArticulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoArticulo $tipoArticulo)
    {
        if($tipoArticulo->delete()){
            session()->flash('success', 'tipoArticulo borrado correctamente');
        }
        else{
            session()->flash('warning', 'No pudo borrarse el tipoArticulo');
        }
        return redirect()->route('tipoArticulos.index');
    }
}
