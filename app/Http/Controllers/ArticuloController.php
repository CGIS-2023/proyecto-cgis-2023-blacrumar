<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticuloRequest;
use App\Http\Requests\UpdateArticuloRequest;
use App\Models\Articulo;
use App\Models\TipoArticulo;
use App\Models\UnidadMedida;


class ArticuloController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Articulo::class, 'articulo');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::paginate(25); 
        return view('/articulos/index', ['articulos' => $articulos]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoArticulos = TipoArticulo::all();
        $unidadMedidas = UnidadMedida::all();
        return view('articulos/create', ['tipoArticulos' => $tipoArticulos, 'unidadMedidas' => $unidadMedidas]);
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
            'tipo_articulo_id' => 'string|max:255',
            'cantidad' => 'required|numeric|min:0',
            'cantidad_minima' => 'numeric|min:0',
            'unidad_medida_id' => 'string:255',
        
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
        $tipoArticulos = TipoArticulo::all();
        $unidadMedidas = UnidadMedida::all();
        return view('articulos/show', ['articulo' => $articulo, 'tipoArticulos' => $tipoArticulos, 'unidadMedidas' => $unidadMedidas]);
    
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        $tipoArticulos = TipoArticulo::all();
        $unidadMedidas = UnidadMedida::all();
        return view('articulos/edit', ['articulo' => $articulo, 'tipoArticulos' => $tipoArticulos, 'unidadMedidas' => $unidadMedidas]);
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
            'tipo_articulo_id' => 'string|max:255',
            'cantidad' => 'required|numeric|min:0',
            'cantidad_minima' => 'numeric|min:0',
            'unidad_medida_id' => 'string|max:255',
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

    

    public function attach_proveedor(Request $request, Articulo $articulo)
    {
        $this->validateWithBag('attach',$request, [
            'proveedor_id' => 'required|exists:proveedors,id',
        ]);
        
        return redirect()->route('articulos.edit', $articulo->id);
    }

    public function detach_proveedor(Articulo $articulo, Proveedor $proveedor)
    {
        $articulo->proveedors()->detach($proveedor->id);
        return redirect()->route('articulos.edit', $articulo->id);
    }
    
}
