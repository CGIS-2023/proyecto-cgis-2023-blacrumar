<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedors = Proveedor::paginate(25);
        return view('/proveedors/index', ['proveedors' => $proveedors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedors/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProveedorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProveedorRequest $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|string|max:255',
            'web' => 'required|string|max:255',
        ]);
        $proveedor = new Proveedor($request->all());
        $proveedor->save();
        session()->flash('success', 'Proveedor creado correctamente');
        return redirect()->route('proveedors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //return view('proveedors/show', ['proveedor' => $proveedor, );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedors/edit', ['proveedor' => $proveedor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProveedorRequest  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProveedorRequest $request, Proveedor $proveedor)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|string|max:255',
            'web' => 'required|string|max:255',
        ]);
        $proveedor->fill($request->all());
        $proveedor->save();
        session()->flash('success', 'Proveedor modificado correctamente');
        return redirect()->route('proveedors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        if($proveedor->delete()) {
            session()->flash('success', 'Proveedor borrado correctamente');
        }
        else{
            session()->flash('warning', 'El proveedor no pudo borrarse. Es probable que se deba a que tenga asociada información como articulos que dependen de él.');
        }
        return redirect()->route('proveedors.index');
    }
}
