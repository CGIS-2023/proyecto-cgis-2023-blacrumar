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
                        <form method="POST" action="{{ route('pedidos.update', $pedido->id) }}">
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


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    Línea pedidos actuales
                </div>
                {{--<div class="flex items-center mt-4 ml-2">
                    <form method="GET" action="{{ route('lineaPedidos.create') }}">
                        <x-button type="subit" class="ml-4">
                            {{ __('Crear linea pedido') }}
                        </x-button>
                    </form>
                </div>--}}
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-900 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Precio</th>
                            <th class="py-3 px-6 text-left">Cantidad Pedida</th>
                            <th class="py-3 px-6 text-left">ID pedido</th>
                            <th class="py-3 px-6 text-left">Nombre Artículo</th>                            
                            <th class="py-3 px-6 text-center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($lineaPedidos as $lineaPedido)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$lineaPedido->precio}} </span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$lineaPedido->cantidad_pedida}} </span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">

                                        {{--<div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{route('lineaPedidos.edit', $lineaPedido->id)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>--}}
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
                    Añadir Linea Pedido
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors->attach" />
                    <form method="POST" action="{{ route('lineaPedidos.edit', [$pedido->id]) }}">
                        @csrf

                        <div class="mt-4">
                            <x-label for="lineaPedido_id" :value="__('Linea Pedido')" />


                            <x-select id="lineaPedido_id" name="lineaPedido_id" required>
                                <option value="">{{__('Elige una línea pedido')}}</option>
                                @foreach ($lineaPedidos as $lineaPedido)
                                    <option value="{{$lineaPedido->articulo_id}}" @if (old('articulo_id') == $lineaPedido->articulo_id) selected @endif>{{$lineaPedido->articulo_nombre}} </option>
                                @endforeach
                            </x-select>
                        </div>

                        <div class="mt-4">
                            <x-label for="precio" :value="__('Precio')" />

                            <x-input id="precio" class="block mt-1 w-full"
                                     type="numeric"
                                     name="precio"
                                     :value="old('precio')"
                                     required />
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