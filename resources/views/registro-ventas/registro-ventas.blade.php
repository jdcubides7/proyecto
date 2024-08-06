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
                    <h1 class="text-capitalize">Modulo de registro de ventas restsoft</h1>
                    <form action="" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="venta_numero" class="form-label">Venta número</label>
                                <input type="text" class="form-control readonly-like-disabled" id="venta_numero" name="venta_numero" value="{{$nextId}}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cliente_nombre" class="form-label">Nombres y Apellidos del cliente</label>
                                <input type="text" class="form-control" id="cliente_nombre" name="cliente_nombre" value="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tipo_documento" class="form-label">Tipo documento de identidad</label>

                                <select class="form-control" id="tipo_documento" name="tipo_documento_id" required>
                                    @foreach($tiposDocumento as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="numero_documento" class="form-label">Número documento identidad</label>
                                <input type="text" class="form-control" id="numero_documento" name="numero_documento" value="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="telefono_cliente" class="form-label">Teléfono cliente</label>
                                <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="direccion_cliente" class="form-label">Dirección cliente</label>
                                <input type="text" class="form-control" id="direccion_cliente" name="direccion_cliente" value="">
                            </div>
                        </div>

                        <div class="mb-3">
                            <x-primary-button type="#" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Limpiar') }}
                            </x-primary-button>
                            <x-primary-button type="#" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Registrar Venta') }}
                            </x-primary-button>
                            <x-primary-button id="atrasButton" type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Atras') }}
                            </x-primary-button>
                        </div>
                    </form>

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