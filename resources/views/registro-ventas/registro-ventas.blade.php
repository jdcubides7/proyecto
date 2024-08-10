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
                    <form action="" method="#">
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

                        <div class="container">
                            <table class="table table-bordered" id="productosTable">
                                <thead>
                                    <tr>
                                        <th>ID Producto</th>
                                        <th>Nombre Producto</th>
                                        <th>Cantidad</th>
                                        <th>Valor por Unidad</th>
                                        <th>Valor Total Producto</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="producto-row producto-row-template">
                                        <td>
                                            <select class="form-control id_producto" name="productos[0][id]" required>
                                                @foreach($idProducto as $id_prod)
                                                <option value="{{ $id_prod->id }}" data-precio="{{$id_prod->precio}}" data-nombre="{{ $id_prod->nombre }}">{{ $id_prod->id }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control readonly-like-disabled nombre_producto" name="productos[0][nombre]" readonly>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control cantidad_productos" name="productos[0][cantidad]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control readonly-like-disabled precio_producto_x_unidad" name="productos[0][precio]" readonly>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control readonly-like-disabled valor_total_productos" name="productos[0][total]" readonly>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" id="addProductButton" class="btn btn-success">Agregar Producto</button>
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
            window.history.back();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Función para inicializar los eventos en una fila de producto
            function initializeProductRow(row) {
                const selectElement = row.querySelector('.id_producto');
                const inputElementNombre = row.querySelector('.nombre_producto');
                const inputElementPrecio = row.querySelector('.precio_producto_x_unidad');
                const cantidadInput = row.querySelector('.cantidad_productos');
                const valorTotalInput = row.querySelector('.valor_total_productos');

                function calcularValorTotal() {
                    const cantidad = parseFloat(cantidadInput.value) || 0;
                    const precio = parseFloat(inputElementPrecio.value) || 0;
                    const valorTotal = cantidad * precio;
                    valorTotalInput.value = valorTotal.toFixed(2);
                }

                selectElement.addEventListener('change', function() {
                    const selectedOption = selectElement.options[selectElement.selectedIndex];
                    const nombreProducto = selectedOption.getAttribute('data-nombre');
                    const precioProducto = selectedOption.getAttribute('data-precio');

                    inputElementNombre.value = nombreProducto;
                    inputElementPrecio.value = precioProducto;

                    calcularValorTotal();
                });
                selectElement.dispatchEvent(new Event('change'));
                cantidadInput.addEventListener('input', calcularValorTotal);
                inputElementPrecio.addEventListener('input', calcularValorTotal);

                // Eliminar el botón de eliminar anterior (si lo hay) antes de agregar uno nuevo
                const existingDeleteButton = row.querySelector('.btn-eliminar');
                if (existingDeleteButton) {
                    existingDeleteButton.remove();
                }

                // Agregar el botón de eliminar
                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'Eliminar';
                deleteButton.className = 'btn-eliminar';
                deleteButton.addEventListener('click', function() {
                    if (confirm('¿Estás seguro de que quieres eliminar este producto?')) {
                        row.remove(); // Elimina la fila completa solo de la tabla
                    }
                });
                row.appendChild(deleteButton);
            }
            

            // Inicializar la primera fila de producto
            const initialProductRow = document.querySelector('.producto-row');
            if (initialProductRow) {
                initializeProductRow(initialProductRow);
            }

            // Función para agregar una nueva fila de producto
            document.getElementById('addProductButton').addEventListener('click', function() {
                const productosTable = document.getElementById('productosTable').querySelector('tbody');
                const productoRow = document.querySelector('.producto-row');

                const newProductRow = productoRow.cloneNode(true);

                // Limpiar los campos de la nueva fila
                newProductRow.querySelectorAll('input').forEach(function(input) {
                    input.value = '';
                });

                // Asegurarse de que la fila clonada no tenga el mismo ID (si usas IDs únicos)
                newProductRow.querySelectorAll('input, select').forEach(function(el) {
                    el.name = el.name.replace(/\[\d+\]/, `[${productosTable.children.length}]`);
                });

                productosTable.appendChild(newProductRow);
                initializeProductRow(newProductRow);
            });
        });
    </script>



    <div><br></div>

</x-app-layout>