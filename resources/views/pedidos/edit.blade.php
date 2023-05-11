<x-app-layout>
    <x-slot name="header">
        <nav class="font-semibold text-xl text-gray-800 leading-tight" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
              {{-- <li class="flex items-center">
                <a href="#">Home</a>
                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
              </li> --}}
              <li class="flex items-center">
                <a href="{{ route('pedidos.index') }}">{{__('Pedidos')}}</a>
                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
              </li>
              <li>
                <a href="#" class="text-gray-500" aria-current="page">{{__('Editar')}} {{$pedido->id}}</a>
              </li>
            </ol>
          </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    {{__('Información del pedido')}}
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form method="POST" action="{{ route('articulos.update', $articulo->id) }}">
                            @csrf
                            @method('put')
                            <div class="mt-4">
                            <x-label for="fecha_pedido" :value="__('Fecha Pedido')" />

                            <x-input id="fecha_pedido" class="block mt-1 w-full"
                                     type="date-local"
                                     name="fecha_pedido"
                                     :value="$pedido->fecha_pedido->format('Y-m-d\TH:i:s')"
                                     required />
                            </div>

                            <div class="mt-4">
                            <x-label for="fecha_recepcion" :value="__('Fecha de Recepción')" />

                            <x-input id="fecha_recepcion" class="block mt-1 w-full"
                                     type="date-local"
                                     name="fecha_recepcion"
                                     :value="$pedido->fecha_recepcion->format('Y-m-d\TH:i:s')"
                                     required />
                            </div>

                            <div class="mt-4">
                            <x-label for="proveedor_id" :value="__('Proveedor')" />

                            @isset($proveedor)
                                <x-input id="proveedor_id" class="block mt-1 w-full"
                                         type="hidden"
                                         name="proveedor_id"
                                         :value="$proveedor->id"
                                         required />
                                <x-input class="block mt-1 w-full"
                                         type="text"
                                         disabled
                                         value="{{$proveedor->name}}"
                                />
                            @else
                                <x-select id="proveedor_id" name="proveedor_id" required>
                                    <option value="">{{__('Elige un proveedor')}}</option>
                                    @foreach ($proveedors as $proveedor)
                                        <option value="{{$proveedor->id}}" @if ($pedido ->proveedor_id == $proveedor->id) selected @endif>{{$proveedor->name}}</option>
                                    @endforeach
                                </x-select>
                            @endisset
                        </div>

                        <div class="mt-4">
                                <x-label for="recepcionista_id" :value="__('Recepcionista')" />


                                <x-select id="recepcionista_id" name="recepcionista_id" required>
                                    <option value="">{{__('Elige una opción')}}</option>
                                    @foreach ($recepcionistas as $recepcionista)
                                    <option value="{{$recepcionista->id}}" @if ($pedido->recepcionista_id == $recepcionista->id) selected @endif>{{$recepcionista->nombre}}</option>
                                    @endforeach
                                </x-select>
                            </div>

                            <div class="mt-4">
                                <x-label for="administrador_id" :value="__('Administrador')" />


                                <x-select id="administrador_id" name="administrador_id" required>
                                    <option value="">{{__('Elige una opción')}}</option>
                                    @foreach ($administradors as $administrador)
                                    <option value="{{$administrador->id}}" @if ($pedido->administrador_id == $administrador->id) selected @endif>{{$administrador->nombre}}</option>
                                    @endforeach
                                </x-select>
                            </div>

                            <div class="mt-4">
                                <x-label for="odontologo_id" :value="__('Odontologo')" />


                                <x-select id="odontologo_id" name="odontologo_id" required>
                                    <option value="">{{__('Elige una opción')}}</option>
                                    @foreach ($odontologos as $odontologo)
                                    <option value="{{$odontologo->id}}" @if ($pedido->odontologo_id == $odontologo->id) selected @endif>{{$odontologo->nombre}}</option>
                                    @endforeach
                                </x-select>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button type="button" class="bg-red-800 hover:bg-red-700">
                                    <a href={{\Illuminate\Support\Facades\Auth::user()->tipo_usuario_id == 3 ? route('pedidos.index') :  url()->previous()}}>
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