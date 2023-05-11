<x-app-layout>
    <x-slot name="header">
        <nav class="font-semibold text-xl text-gray-800 leading-tight" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
              {{-- <li class="flex items-center">
                <a href="#">Home</a>
                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
              </li> --}}
              <li class="flex items-center">
                <a href="{{ route('pedidos.index') }}">Pedidos</a>
                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
              </li>
              <li>
                <a href="#" class="text-gray-500" aria-current="page">Crear pedido</a>
              </li>
            </ol>
          </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    Información del pedido
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form method="POST" action="{{ route('pedidos.store') }}">
                            @csrf
                            <div class="mt-4">
                            <x-label for="fecha_pedido" :value="__('Fecha Pedido')" />

                            <x-input id="fecha_pedido" class="block mt-1 w-full"
                                     type="date-local"
                                     name="fecha_pedido"
                                     :value="old('fecha_pedido')"
                                     required />
                            </div>
                            <!-- Fecha Recepcion -->
                            <div class="mt-4">
                            <x-label for="fecha_recepcion" :value="__('Fecha de Recepción')" />

                            <x-input id="fecha_recepcion" class="block mt-1 w-full"
                                     type="date-local"
                                     name="fecha_recepcion"
                                     :value="old('fecha_recepcion')"
                                     required />
                            </div>

                            <!-- Recepcionista id -->
                            <div class="mt-4">
                            <x-label for="recepcionista_id" :value="__('Recepcionista')" />

                            @isset($recepcionista)
                                <x-input id="recepcionista_id" class="block mt-1 w-full"
                                         type="hidden"
                                         name="recepcionista_id"
                                         :value="$recepcionista->id"
                                         />
                                <x-input class="block mt-1 w-full"
                                         type="text"
                                         disabled
                                         value="{{$recepcionista->user->name}}"
                                          />
                            @else
                                <x-select id="recepcionista_id" name="recepcionista_id">
                                    <option value="">{{__('Elige un recepcionista')}}</option>
                                    @foreach ($recepcionistas as $recepcionista)
                                        <option value="{{$recepcionista->id}}" @if (old('recepcionista_id') == $recepcionista->id) selected @endif>{{$recepcionista->user->name}}</option>
                                    @endforeach
                                </x-select>
                            @endisset
                        </div>

                            <!-- Administrador id -->
                            <div class="mt-4">
                            <x-label for="administrador_id" :value="__('Administrador')" />

                            @isset($administrador)
                                <x-input id="administrador_id" class="block mt-1 w-full"
                                         type="hidden"
                                         name="administrador_id"
                                         :value="$administrador->id"
                                         />
                                <x-input class="block mt-1 w-full"
                                         type="text"
                                         disabled
                                         value="{{$administrador->user->name}}"
                                          />
                            @else
                                <x-select id="administrador_id" name="administrador_id">
                                    <option value="">{{__('Elige un administrador')}}</option>
                                    @foreach ($administradors as $administrador)
                                        <option value="{{$administrador->id}}" @if (old('administrador_id') == $administrador->id) selected @endif>{{$administrador->user->name}}</option>
                                    @endforeach
                                </x-select>
                            @endisset
                        </div>

                            <!-- Odontologo id -->
                            <div class="mt-4">
                            <x-label for="odontologo_id" :value="__('Odontologo')" />

                            @isset($odontologo)
                                <x-input id="odontologo_id" class="block mt-1 w-full"
                                         type="hidden"
                                         name="odontologo_id"
                                         :value="$odontolo->id"
                                         />
                                <x-input class="block mt-1 w-full"
                                         type="text"
                                         disabled
                                         value="{{$odontologo->user->name}}"
                                          />
                            @else
                                <x-select id="odontologo_id" name="odontologo_id">
                                    <option value="">{{__('Elige un odontologo')}}</option>
                                    @foreach ($odontologos as $odontologo)
                                        <option value="{{$odontologo->id}}" @if (old('odontologo_id') == $odontologo->id) selected @endif>{{$odontologo->user->name}}</option>
                                    @endforeach
                                </x-select>
                            @endisset
                        </div>
                        
                            <!-- Proveedor id -->
                            <div class="mt-4">
                            <x-label for="proveedor_id" :value="__('Proveedor')" />

                            @isset($proveedor)
                                <x-input id="proveedor_id" class="block mt-1 w-full"
                                         type="hidden"
                                         name="proveedor_id"
                                         :value="$proveedor->id"
                                         />
                                <x-input class="block mt-1 w-full"
                                         type="text"
                                         disabled
                                         value="{{$proveedor->user->name}}"
                                          />
                            @else
                                <x-select id="proveedor_id" name="proveedor_id">
                                    <option value="">{{__('Elige un proveedor')}}</option>
                                    @foreach ($proveedors as $proveedor)
                                        <option value="{{$proveedor->id}}" @if (old('proveedor_id') == $proveedor->id) selected @endif>{{$proveedor->id}}</option>
                                    @endforeach
                                </x-select>
                            @endisset
                        </div>
                        

                            <div class="flex items-center justify-end mt-4">
                                <x-button type="button" class="bg-red-800 hover:bg-red-700">
                                    <a href={{route('pedidos.index')}}>
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