<x-app-layout>
    <x-slot name="header">
        <nav class="font-semibold text-xl text-gray-800 leading-tight" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
              {{-- <li class="flex items-center">
                <a href="#">Home</a>
                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
              </li> --}}
              <li class="flex items-center">
                <a href="{{ route('articulos.index') }}">{{__('Artículos')}}</a>
                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
              </li>
              <li>
                <a href="#" class="text-gray-500" aria-current="page">{{__('Editar')}} {{$articulo->nombre}}</a>
              </li>
            </ol>
          </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    {{__('Información del artículo')}}
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <div>
                                <x-label for="name" :value="__('Nombre')" />

                                <x-input id="name" readonly disabled class="block mt-1 w-full" type="text" name="name" :value="$articulo->nombre" required autofocus />
                            </div>

                            <div class="mt-4">
                                <x-label for="cantidad" :value="__('Cantidad')" />

                                <x-input readonly disabled id="cantidad" class="block mt-1 w-full" min="0" step="1" type="number" name="cantidad" :value="$articulo->cantidad" required />
                            </div>

                            <div class="mt-4">
                                <x-label for="cantidad_minima" :value="__('Cantidad Minima')" />

                                <x-input readonly disabled id="cantidad_minima" class="block mt-1 w-full" min="0" step="1" type="number" name="cantidad_minima" :value="$articulo->cantidad_minima" required />
                            </div>

                            <div class="mt-4">
                                <x-label for="tipo_articulo_id" :value="__('Tipo Articulo')" />


                                <x-select readonly disabled id="tipo_articulo_id" name="tipo_articulo_id" required>
                                    <option value="">{{__('Elige una opción')}}</option>
                                    @foreach ($tipoArticulos as $tipoArticulo)
                                    <option value="{{$tipoArticulo->id}}" @if ($articulo->tipo_articulo_id == $tipoArticulo->id) selected @endif>{{$tipoArticulo->nombre}}</option>
                                    @endforeach
                                </x-select>
                            </div>

                            <div class="mt-4">
                                <x-label for="unidad_medida_id" :value="__('Unidad Medida')" />


                                <x-select readonly disabled id="unidad_medida_id" name="unidad_medida_id" required>
                                    <option value="">{{__('Elige una opción')}}</option>
                                    @foreach ($unidadMedidas as $unidadMedida)
                                    <option value="{{$unidadMedida->id}}" @if ($articulo->unidad_medida_id == $unidadMedida->id) selected @endif>{{$unidadMedida->nombre}}</option>
                                    @endforeach
                                </x-select>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button type="button" class="bg-red-800 hover:bg-red-700">
                                    <a href={{route('articulos.index')}}>
                                    {{ __('Volver al listado') }}
                                    </a>
                                </x-button>
                            </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>