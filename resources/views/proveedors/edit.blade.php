<x-app-layout>
    <x-slot name="header">
        <nav class="font-semibold text-xl text-gray-800 leading-tight" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
              {{-- <li class="flex items-center">
                <a href="#">Home</a>
                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
              </li> --}}
              <li class="flex items-center">
                <a href="{{ route('proveedors.index') }}">{{__('Proveedores')}}</a>
                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
              </li>
              <li>
                <a href="#" class="text-gray-500" aria-current="page">{{__('Editar')}} {{$proveedor->name}}</a>
              </li>
            </ol>
          </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    {{__('Información del proveedor')}}
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form method="POST" action="{{ route('proveedors.update', $proveedor->id) }}">
                            @csrf
                            @method('put')
                            <div>
                                <x-label for="name" :value="__('Nombre')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="nombre" :value="$proveedor->nombre" required autofocus />
                            </div>

                          <!-- Direccion -->
                            <div class="mt-4">
                                <x-label for="direccion" :value="__('Direccion')" />

                                <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="$proveedor->direccion" required />
                            </div>


                            <!-- Telefono -->
                            <div class="mt-4">
                                <x-label for="telefono" :value="__('Telefono')" />

                                <x-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="$proveedor->telefono" required />
                            </div>


                            <!-- Email -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')" />

                                <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="$proveedor->email" required />
                            </div>

                            <!-- Web -->
                            <div class="mt-4">
                                <x-label for="web" :value="__('Web')" />

                                <x-input id="web" class="block mt-1 w-full" type="text" name="web" :value="$proveedor->web" required />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button type="button" class="bg-red-800 hover:bg-red-700">
                                    <a href={{\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 3 ? route('proveedors.index') :  url()->previous()}}>
                                    {{ __('Cancelar') }}
                                    </a>
                                </x-button>
                                <x-button class="ml-4">
                                    {{ __('Guardar') }}
                                </x-button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    Artículos actuales
                </div>
                {{--<div class="flex items-center mt-4 ml-2">
                    <form method="GET" action="{{ route('articulos.create') }}">
                        <x-button type="subit" class="ml-4">
                            {{ __('Crear articulo') }}
                        </x-button>
                    </form>
                </div>--}}
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-900 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Artículo</th>
                            <th class="py-3 px-6 text-left">Precio</th>
                            <th class="py-3 px-6 text-center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($proveedor->articulos as $articulo)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$articulo->nombre}} {{$articulo->tipo_articulo_id}} {{$articulo->cantidad}} {{$articulo->unidad_medida_id}} {{$articulo->cantidad_minima}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$articulo->pivot->precio}} </span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">

                                        {{--<div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{route('articulos.edit', $articulo->id)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>--}}
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <form id="detach-form-{{$proveedor->id}}-{{$articulo->id}}" method="POST" action="{{ route('proveedors.detachMedicamento', [$proveedor->id, $articulo->id]) }}">
                                                @csrf
                                                @method('delete')
                                                <a class="cursor-pointer" onclick="getElementById('detach-form-{{$proveedor->id}}-{{$articulo->id}}').submit();">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </a>
                                            </form>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    Añadir artículo
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors->attach" />
                    <form method="POST" action="{{ route('proveedors.attachArticulo', [$proveedor->id]) }}">
                        @csrf

                        <div class="mt-4">
                            <x-label for="articulo_id" :value="__('Articulo')" />


                            <x-select id="articulo_id" name="articulo_id" required>
                                <option value="">{{__('Elige un articulo')}}</option>
                                @foreach ($articulos as $articulo)
                                    <option value="{{$articulo->id}}" @if (old('articulo_id') == $articulo->id) selected @endif>{{$articulo->nombre}} </option>
                                @endforeach
                            </x-select>
                        </div>

                        <div class="mt-4">
                            <x-label for="precio" :value="__('Precio del artículo')" />

                            <x-input id="precio" class="block mt-1 w-full"
                                     type="numeric"
                                     name="precio"
                                     :value="old('precio')"
                                     required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button type="button" class="bg-red-800 hover:bg-red-700">
                                <a href={{route('odontologos.index')}}>
                                    {{ __('Cancelar') }}
                                </a>
                            </x-button>
                            <x-button class="ml-4">
                                {{ __('Guardar') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>