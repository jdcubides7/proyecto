<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
//
use App\Models\Registro;
use App\Models\Autenticacion_Usuarios;

//
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {


        $contraseña = $request->input('password');

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        //formulario - vista
        //crea registro en la tabla registro con la contraseña desencriptada
        

        // Guardar otros datos en otra tabla si es necesario
    $ultimoId = DB::table('autenticacion_usuarios')->max('id');
    $nuevoId = $ultimoId ? $ultimoId + 1 : 1;

    DB::table('autenticacion_usuarios')->insert([
        'id' => $nuevoId,
        'id_usuario' => $user->id,
        'nombre' => $user->name,
        'correo' => $user->email,
        'contraseña' => $contraseña, // Usa la contraseña cifrada
        'created_at' => now(),
        'updated_at' => now(),
    ]);


        event(new Registered($user));

        Auth::login($user);

     //   return redirect(RouteServiceProvider::HOME);
        $var = '/';
     return redirect(RouteServiceProvider::HOME2);
    }
}
