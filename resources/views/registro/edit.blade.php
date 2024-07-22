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

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="container">
                    <h1>Formulario de actualizacion de registros de la tabla {{ ucfirst($tabla) }}</h1>
                    <form action="{{ route('registro.update', ['tabla' => $tabla, 'id' => $registro->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @foreach((array) $registro as $campo => $valor)
                        <div class="mb-3">
                            <label for="{{ $campo }}" class="form-label">{{ ucfirst($campo) }}</label>
                            <input type="text" class="form-control" id="{{ $campo }}" name="{{ $campo }}" value="{{ $valor }}">
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>