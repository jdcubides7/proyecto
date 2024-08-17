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
                    <form action="{{ route('registro-ventas.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="venta_numero" class="form-label">Venta número</label>
                                <input type="text" class="form-control readonly-like-disabled" id="venta_numero" name="venta_numero" value="{{$nextId}}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cliente_nombre" class="form-label">Nombres y Apellidos del cliente</label>
                                <input type="text" class="form-control" id="cliente_nombre" name="cliente_nombre" value="" required>
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
                                <input type="text" class="form-control" id="numero_documento" name="numero_documento" value="" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="telefono_cliente" class="form-label">Teléfono cliente</label>
                                <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" value="" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="direccion_cliente" class="form-label">Dirección cliente</label>
                                <input type="text" class="form-control" id="direccion_cliente" name="direccion_cliente" value="" required>
                            </div>
                        </div>

                        <div class="container">
                            <table class="table table-bordered" id="productosTable">
                                <thead>
                                    <tr>
                                        <th>Categoria de comida</th>
                                        <th>Producto a seleccionar</th>
                                        <th>Producto seleccionado</th>
                                        <th>Cantidad</th>
                                        <th>Valor por Unidad</th>
                                        <th>Valor Total Producto</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="producto-row producto-row-template">
                                        <td>
                                            <select class="form-control nombre_categoria" name="productos[0][categoria]" required>
                                                <option value="">Seleccionar Categoría</option>
                                                @foreach($nombreCategoria as $categoria)
                                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control producto_a_seleccionar" name="productos[0][id]" required>
                                                <option value="">Seleccionar Producto</option>
                                                <!-- Opciones se llenarán dinámicamente -->
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
                            <div class="container-s-s">
                                <div class="button-container">
                                    <button type="button" id="addProductButton" class="btn btn-success">Agregar Producto</button>
                                </div>

                                <div class="input-container col-md-3 mb-3">
                                    <label for="total_venta" class="form-label">Total Venta</label>
                                    <div class="input-wrapper">
                                        <input type="text" class="form-control readonly-like-disabled" id="total_venta" name="total_venta" readonly>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="mb-3">
                            <x-primary-button type="#" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" formnovalidate>
                                {{ __('Limpiar') }}
                            </x-primary-button>
                            <x-primary-button id="registerSaleButton" type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
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
            window.location.href = '/dashboard';
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('registerSaleButton').addEventListener('click', function(event) {
                if (confirm('¿Estás seguro de que quieres registrar la venta?')) {
                    alert('Su venta fue registrada con éxito');
                    // Aquí puedes agregar lógica adicional si lo necesitas
                } else {
                    event.preventDefault();
                }
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function initializeProductRow(row) {
                const selectCategoriaElement = row.querySelector('.nombre_categoria');
                const selectProductoElement = row.querySelector('.producto_a_seleccionar');
                const inputElementNombre = row.querySelector('.nombre_producto');
                const inputElementPrecio = row.querySelector('.precio_producto_x_unidad');
                const cantidadInput = row.querySelector('.cantidad_productos');
                const valorTotalInput = row.querySelector('.valor_total_productos');

                function calcularValorTotal() {
                    const cantidad = parseFloat(cantidadInput.value) || 0;
                    const precio = parseFloat(inputElementPrecio.value) || 0;
                    const valorTotal = cantidad * precio;
                    valorTotalInput.value = valorTotal.toFixed(2);
                    actualizarTotalVenta();
                }

                function actualizarTotalVenta() {
                    const filas = document.querySelectorAll('#productosTable tbody .producto-row');
                    let totalVenta = 0;
                    filas.forEach(fila => {
                        const valorTotal = parseFloat(fila.querySelector('.valor_total_productos').value) || 0;
                        totalVenta += valorTotal;
                    });
                    document.getElementById('total_venta').value = totalVenta.toFixed(2);
                }

                function actualizarProductos() {
                    const categoriaId = selectCategoriaElement.value;
                    selectProductoElement.innerHTML = '<option value="">Seleccionar Producto</option>';
                    inputElementNombre.value = '';
                    inputElementPrecio.value = '';

                    if (categoriaId) {
                        fetch(`/productos/categoria/${categoriaId}`)
                            .then(response => response.json())
                            .then(productos => {
                                productos.forEach(producto => {
                                    const option = document.createElement('option');
                                    option.value = producto.id;
                                    option.textContent = producto.nombre;
                                    option.setAttribute('data-nombre', producto.nombre);
                                    option.setAttribute('data-precio', producto.precio);
                                    selectProductoElement.appendChild(option);
                                });
                            })
                            .catch(error => console.error('Error:', error));
                    }
                }

                selectCategoriaElement.addEventListener('change', actualizarProductos);

                selectProductoElement.addEventListener('change', function() {
                    const selectedOption = selectProductoElement.options[selectProductoElement.selectedIndex];
                    const nombreProducto = selectedOption.getAttribute('data-nombre');
                    const precioProducto = selectedOption.getAttribute('data-precio');

                    inputElementNombre.value = nombreProducto;
                    inputElementPrecio.value = precioProducto;

                    calcularValorTotal();
                });

                cantidadInput.addEventListener('input', calcularValorTotal);
                inputElementPrecio.addEventListener('input', calcularValorTotal);

                const existingDeleteButton = row.querySelector('.btn-eliminar');
                if (existingDeleteButton) {
                    existingDeleteButton.remove();
                }

                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'Eliminar';
                deleteButton.className = 'btn-eliminar';
                deleteButton.addEventListener('click', function() {
                    if (confirm('¿Estás seguro de que quieres eliminar este producto?')) {
                        row.remove();
                        actualizarTotalVenta();
                        const productosTable = document.getElementById('productosTable').querySelector('tbody');
                        if (productosTable.rows.length === 0) {
                            const emptyRow = document.createElement('tr');
                            emptyRow.className = 'producto-row producto-row-template';
                            emptyRow.innerHTML = row.innerHTML;
                            productosTable.appendChild(emptyRow);
                            initializeProductRow(emptyRow);
                        }
                    }
                });
                row.appendChild(deleteButton);
            }

            const productoRow = document.querySelector('.producto-row');
            if (productoRow) {
                initializeProductRow(productoRow);
            }

            document.getElementById('addProductButton').addEventListener('click', function() {
                const productosTable = document.getElementById('productosTable').querySelector('tbody');
                if (productosTable.rows.length === 0) {
                    productosTable.innerHTML = '';
                }

                const newProductRow = productoRow.cloneNode(true);
                newProductRow.classList.remove('producto-row-template');

                newProductRow.querySelectorAll('input').forEach(function(input) {
                    input.value = '';
                });

                newProductRow.querySelectorAll('input, select').forEach(function(el) {
                    el.name = el.name.replace(/\[\d+\]/, `[${productosTable.children.length}]`);
                });

                productosTable.appendChild(newProductRow);
                initializeProductRow(newProductRow);

                actualizarTotalVenta();
            });

            function initializeTable() {
                const categorias = document.querySelectorAll('.nombre_categoria');
                categorias.forEach(categoria => {
                    const selectedCategoriaId = categoria.value;
                    if (selectedCategoriaId) {
                        actualizarProductos(categoria);
                    }
                });
            }

            initializeTable();
        });
    </script>

</x-app-layout>