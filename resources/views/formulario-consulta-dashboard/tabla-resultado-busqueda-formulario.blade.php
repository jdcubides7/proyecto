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
