<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;
use App\Models\Proveedor;
use App\Models\Articulo;
use App\Models\Odontologo;
use App\Models\Auxiliar;
use App\Models\Administrador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Proveedor::class, 'proveedor');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedors = Proveedor::query()
            ->when(request('busqueda'), function($query) {
                return $query->where('nombre', 'like', '%' . request('busqueda') . '%');     
        })
        ->paginate(25);
        return view('/proveedors/index', ['proveedors' => $proveedors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $odontologos = Odontologo::all();
        $administradors = Administrador::all();
        if(Auth::user()->tipo_usuario_id == 1){
            return view('proveedors/create', ['administrador' => Auth::user()->administrador, 'odontologos' => $odontologos]);
        }
        elseif(Auth::user()->tipo_usuario_id == 2) {
            return view('proveedors/create', ['odontologo' => Auth::user()->odontologo, 'administradors' => $administradors]);
        }
        return view('proveedors/create', ['administradors' => $administradors, 'odontologos' => $odontologos]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProveedorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProveedorRequest $request)
    {
        $reglas = [
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|string|max:255',
            'web' => 'required|string|max:255',
        ];
        /*
        if(Auth::user()->tipo_usuario_id == 3){
            $reglas_auxiliar = ['auxiliar_id' => ['required', 'exists:auxiliars,id', Rule::in(Auth::user()->auxiliar->id)]];
            $reglas = array_merge($reglas_auxiliar, $reglas);
        }
        else{
            $reglas_generales = ['auxiliar_id' => ['required', 'exists:auxiliars,id']];
            $reglas = array_merge($reglas_generales, $reglas);
        }
*/
        $this->validate($request, $reglas);
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
        /*
        $articulos = Articulo::all();
        return view('proveedors/show', ['proveedor' => $proveedor, 'articulos' => $articulos]);
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        //Le paso a la vista los articulos porque permito añadir uno desde esa misma vista
        $articulos = Articulo::all();
        $odontologos = Odontologo::all();
        $auxiliars = Auxiliar::all();
        if(Auth::user()->tipo_usuario_id == 1){
            return view('proveedors/edit', ['proveedor' => $proveedor, 'administrador' => Auth::user()->administrador, 'odontologos' => $odontologos, 'articulos' => $articulos]);
        }
        elseif(Auth::user()->tipo_usuario_id == 2) {
            return view('proveedors/edit', ['proveedor' => $proveedor, 'odontologo' => Auth::user()->odontologo, 'administradors' => $administradors, 'articulos' => $articulos]);
        }
        return view('proveedors/edit', ['proveedor' => $proveedor, 'administradors' => $administradors, 'odontologos' => $odontologos, 'articulos' => $articulos]);
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
        $reglas = [
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|string|max:255',
            'web' => 'required|string|max:255',
        ];
        /*
        if(Auth::user()->tipo_usuario_id == 3){
            $reglas_auxiliar = ['auxiliar_id' => ['required', 'exists:auxiliars,id', Rule::in(Auth::user()->auxiliar->id)]];
            $reglas = array_merge($reglas_auxiliar, $reglas);
        }
        else{
            $reglas_generales = ['auxiliar_id' => ['required', 'exists:auxiliars,id']];
            $reglas = array_merge($reglas_generales, $reglas);
        }
        */
        $this->validate($request, $reglas);
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

    public function attach_articulo(Request $request, Proveedor $proveedor)
    {
        $this->validateWithBag('attach',$request, [
            'articulo_id' => 'required|exists:articulos,id',
            'precio' => 'required|numeric',
        ]);
        $proveedor->articulos()->attach($request->articulo_id, [
            'precio' => $request->precio,
        ]);
        return redirect()->route('proveedors.edit', $proveedor->id);
    }

    public function detach_articulo(Proveedor $proveedor, Articulo $articulo)
    {
        $proveedor->articulos()->detach($articulo->id);
        return redirect()->route('proveedors.edit', $proveedor->id);
    }
}
