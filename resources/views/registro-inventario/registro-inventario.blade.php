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

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Actualizacion de inventario RestSoft</h1>
                </div>
            </div>
            <table class="fixed-table">
                    <tr>

                    <th>id
                    </th>

                    <th>id_categoria
                    </th>

                    <th>id_producto
                    </th>

                    <th>cantidad_disponible
                    </th>

                    <th>disponibilidad <!--disponible si o no -->
                    </th>

                    <th>fecha_creacion
                    </th>

                    <th>fecha_modificacion
                    </th>

                    <th>eliminar
                    </th>

                    <th>editar
                    </th>

                    </tr>
            </table>
        </div>

    </div>

</x-app-layout>