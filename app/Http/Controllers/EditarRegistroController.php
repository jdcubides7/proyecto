<?php

namespace App\Http\Controllers;

//use App\Models\Registro;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class EditarRegistroController extends Controller
{
    public function edit($tabla, $id)
    {

        //     $registro = Registro::findOrFail($id);
        //     return view('registro.edit', compact('registro'));


        if (!in_array($tabla, ['registros', 'users', 'tablas_sistema', 'autenticacion_usuarios', 'productos'])) {
            return redirect()->back()->withErrors(['error' => 'Tabla no permitida']);
        }

        // Obtener el registro de la tabla correspondiente
        $registro = DB::table($tabla)->find($id);

        return view('registro.edit', compact('registro', 'tabla'));
    }

    public function update(Request $request, $tabla, $id)
    {

        //$registro = Registro::findOrFail($id);
        //$registro->update($request->all());
        //return redirect()->route('dashboard')->with('success', 'Registro actualizado correctamente.');
        // Verificar que la tabla está permitida
        if (!in_array($tabla, ['registros', 'users', 'tablas_sistema', 'autenticacion_usuarios', 'productos'])) {
            return redirect()->back()->withErrors(['error' => 'Tabla no permitida']);
        }

        // Actualizar el registro en la tabla correspondiente
        DB::table($tabla)->where('id', $id)->update($request->except('_token', '_method'));

        return redirect()->route('dashboard')->with('success', 'Registro actualizado correctamente.');
    }
}
