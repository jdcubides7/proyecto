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