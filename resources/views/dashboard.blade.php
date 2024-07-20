@extends('connect.pagina')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Art Grafic') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("¡Estás Logueado!") }}
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('dashboard.buscar') }}" method="POST">
        @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Sistema de Actualización de Registros") }}
                </div>
                <div>
                    <label class="p-6 text-gray-900 dark:text-gray-100">Selecciona la tabla a validar: </label>
                    <select class="selection" name="tablas" id="tablas" required>
                        <option class="p-6 text-gray-900 dark:text-gray-100" value="">Seleccione</option>
                        @foreach($datos as $tablas_sistema)
                        <option value="{{ $tablas_sistema->id }}">{{ $tablas_sistema->nombre_tabla }}</option>
                        @endforeach
                    </select>
                    <x-primary-button>{{ __('Buscar') }}</x-primary-button>
                    <x-primary-button type="button" id="clearButton">{{ __('Limpiar') }}</x-primary-button>
                </div>
            </div>
        </div>
    </form>

    @if(isset($resultados))
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium">Resultados de la Búsqueda</h3>
                    <div class="table-responsive">
                        @if(count($resultados) > 0)
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr>
                                    @foreach (array_keys((array) $resultados->first()) as $key)
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ ucfirst($key) }}
                                    </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach($resultados as $resultado)
                                <tr>
                                    @foreach((array) $resultado as $value)
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $value }}
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p>No se encontraron resultados en la tabla {{ $tablas_sistema->nombre_tabla }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script>
        document.getElementById('clearButton').addEventListener('click', function() {
            // Redirigir a la ruta que carga la vista inicial con un parámetro de consulta
            //recarga la pagina y la deja limpia importante
            window.location.href = "{{ route('dashboard') }}?clear=true";
        });
    </script>

</x-app-layout>