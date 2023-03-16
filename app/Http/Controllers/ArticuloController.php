<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticuloRequest;
use App\Http\Requests\UpdateArticuloRequest;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::paginate(25); //QUE ES PAGINATE
        return view('/articulos/index', ['articulos' => $articulos])
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticuloRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticuloRequest $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'tipo_articulo_id' => '',
            'cantidad' => 'required|numeric',
            'cantidad_minima' => 'required|numeric',
            'unidad_medida_id' => '',
        
        ]);
        $articulo = new Articulo($request->all());
        $articulo->save();
        session()->flash('success', 'Articulo creado correctamente.');
        return redirect()->route('articulos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        return view('articulos/edit', ['articulo' => $articulo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticuloRequest  $request
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticuloRequest $request, Articulo $articulo)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'tipo_articulo_id' => '',
            'cantidad' => 'required|numeric',
            'cantidad_minima' => 'required|numeric',
            'unidad_medida_id' => '',
        ]);
        $articulo->fill($request->all());
        $articulo->save();
        session()->flash('success', 'Articulo modificado correctamente');
        return redirect()->route('articulos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        if($articulo->delete()){
            session()->flash('success', 'Articulo borrado correctamente');
        }
        else{
            session()->flash('warning', 'No pudo borrarse el articulo');
        }
        return redirect()->route('articulos.index');
    }
}
