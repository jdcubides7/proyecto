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

    <div>

    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="container">
                    <h1>Formulario de eliminacion de registros de la tabla {{ ucfirst($tabla) }}</h1>
                    <form action="{{ route('registro.destroy', ['tabla' => $tabla, 'id' => $registro->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        @foreach((array) $registro as $campo => $valor)
                        <div class="mb-3">
                            <label for="{{ $campo }}" class="form-label">{{ ucfirst($campo) }}:</label>
                            <input type="text" class="form-control" id="{{ $campo }}" name="{{ $campo }}" value="{{ $valor }}">
                        </div>
                        @endforeach
                        <x-primary-button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Eliminar') }}
                        </x-primary-button>
                        <!--mirar como funciona boton atras-->
                        <x-primary-button id="atrasButton" type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Atras') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
<script>
        document.getElementById('atrasButton').addEventListener('click', function() {
            // Redirige a la página anterior en el historial del navegador
            window.history.back();
        });
    </script>
    
</x-app-layout>