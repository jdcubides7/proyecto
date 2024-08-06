@extends('connect.pagina')
@section('title','Art Grafic')
@section('content')
<div>
    <div>
        <!--buscador-->
        <nav class="navbar">
            <div class="container-fluid ">
                <a class="navbar-brand">Art Grafic Ltda</a>
                <form class="d-flex" role="search">
                    <!--<a href="#" class="btn1" type="submit">Registrarse</a>-->
                    <!--<button type="button" class="btn btn-primary">Primary</button>-->
                    <!--boton con clases-->
                    <a class="btn-pagina-inicio" href="{{url('/seccion-inicio')}}">Art Grafic</a>
                    <!--<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
                    <a class="btn-registro-datos" href="{{url('/registro')}}">Registrarse</a>
                </form>
            </div>
    </div>

    <body class="body-login">
        <div>
            <!-- se hace desde aqui -->
            <form class="form-register" method="POST" action="{{ route('login') }}">
                <!--registro base de datos con metodo post-->
                @csrf
                <div>
                    <center>
                        <h4>Acceder al sistema</h4>
                    </center>
                </div>
                <div>
                    <x-input-label for="email" :value="__('Ingrese correo:')" />
                    <x-text-input class="input-1" id="email" type="email" name="email" :value="old('email')" placeholder="Ingrese su Correo" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Ingrese Contraseña:')" />
                    <x-text-input class="input-2" id="password" type="password" name="password" placeholder="Ingrese su Contraseña" required autocomplete="current-password" />
                    <span class="toggle-password" onclick="togglePassword()">👁️</span>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!--
				<div>
					<label>Seleccione su rol: </label>
					<select class="selection" name="rol" id="rol" required>
					<option value="admin" id="admin">Administrador</option>
					<option value="usuario" id="usuario">Usuario</option>
				</select>
			</div>
			-->
                <!--  <input class="input" type="password" name="correo" id="correo" placeholder="Ingrese su Contraseña"> -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recordar credenciales') }}</span>
                    </label>
                </div>
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('¿Olvido su contraseña?') }}
                    </a>
                    @endif

                    <input class="btn-registro" id="btnSave" type="submit" value="Ingresar" />
                </div>
            </form>
        </div>
        <script>
            function togglePassword() {
                const passwordField = document.getElementById('password');
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);

                const toggleIcon = document.querySelector('.toggle-password');
                toggleIcon.textContent = type === 'password' ? '👁️' : '🙈';
            }
        </script>
    </body>
</div>
@stop