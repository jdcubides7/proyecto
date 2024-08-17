<?php

namespace App\Http\Controllers;

//use App\Models\Registro;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Autenticacion_Usuarios;

use Illuminate\Support\Facades\DB;

class EditarRegistroController extends Controller
{
    public function edit($tabla, $id)
    {

        //     $registro = Registro::findOrFail($id);
        //     return view('registro.edit', compact('registro'));


        if (!in_array($tabla, ['registros', 'users', 'tablas_sistema', 'autenticacion_usuarios', 'productos', 'proveedores', 'categorias', 'inventario','ordenes_compra','detalle_orden_compra','ventas','detalle_venta','ajustes_inventario','tipo_documento'])) {
            return redirect()->back()->withErrors(['error' => 'Tabla no permitida']);
        }

        // Obtener el registro de la tabla correspondiente
        $registro = DB::table($tabla)->find($id);

        return view('registro.edit', compact('registro', 'tabla', 'id'));
    }

    public function update(Request $request, $tabla, $id)
    {

        //$registro = Registro::findOrFail($id);
        //$registro->update($request->all());
        //return redirect()->route('dashboard')->with('success', 'Registro actualizado correctamente.');
        // Verificar que la tabla está permitida
        if (!in_array($tabla, ['registros', 'users', 'tablas_sistema', 'autenticacion_usuarios', 'productos', 'proveedores', 'categorias', 'inventario','ordenes_compra','detalle_orden_compra','ventas','detalle_venta','ajustes_inventario','tipo_documento'])) {
            return redirect()->back()->withErrors(['error' => 'Tabla no permitida']);
        }

        //        if ($tabla == 'users') {
        //            try {
        //
        //
        //                // Obtén el nombre del usuario de la tabla `users` usando el id
        //                $nombreUsuario = DB::table('users')->where('id', $id)->value('name'); // Ajusta 'name' según tu esquema
        //
        //                if ($nombreUsuario !== null) {
        //                    // Verifica si el registro ya existe en `autenticacion_usuarios`
        //                    $registroExistente = DB::table('autenticacion_usuarios')->where('id', $id)->first();
        //                    $correo = DB::table('users')->where('id', $id)->value('email');
        //                    $contraseña = DB::table('users')->where('id', $id)->value('password');
        //
        //
        //                    if ($registroExistente) {
        //                        // Si el registro existe, actualízalo
        //                        DB::table('autenticacion_usuarios')->where('id', $id)->update(['nombre' => $nombreUsuario]);
        //                    } else {
        //                        // Si el registro no existe, crea uno nuevo
        //                        // Encuentra el último id registrado o establece 1 si no hay registros
        //                        $ultimoId = DB::table('autenticacion_usuarios')->max('id');
        //                        $nuevoId = $ultimoId ? $ultimoId + 1 : 1;
        //
        //
        //
        //                        DB::table('autenticacion_usuarios')->insert([
        //                            'id' => $nuevoId,
        //                            'nombre' => $nombreUsuario,
        //                            'correo' => $correo,
        //                            'contraseña' => $contraseña,
        //                            'created_at' => now(),
        //                            'updated_at' => now()
        //                        ]);
        //                    }
        //                }
        //            } catch (QueryException $e) {
        //                //  excepciones específicas de consulta SQL
        //                return redirect()->back()->withErrors(['error' => 'Error de base de datos: ' . $e->getMessage()]);
        //            } catch (\Exception $e) {
        //                //  excepciones generales
        //                return redirect()->back()->withErrors(['error' => 'Error inesperado: ' . $e->getMessage()]);
        //            }
        //        }


        // Actualizar el registro en la tabla correspondiente
        DB::table($tabla)->where('id', $id)->update($request->except('_token', '_method'));

        return redirect()->route('dashboard')->with('success', 'Registro actualizado correctamente.');
    }

    public function show($tabla, $id)
    {
        if (!in_array($tabla, ['registros', 'users', 'tablas_sistema', 'autenticacion_usuarios', 'productos', 'categorias', 'inventario', 'proveedores','ordenes_compra','detalle_orden_compra','ventas','detalle_venta','ajustes_inventario','tipo_documento'])) {
            return redirect()->back()->withErrors(['error' => 'Tabla no permitida']);
        }
        $registro = DB::table($tabla)->find($id);
        return view('registro.delete', compact('registro', 'tabla'));
    }
    public function destroy($tabla, $id)
    //en la tabla autenticacion usuarios no elimina el ultimo registro de la base de datos
    {
        $record = DB::table($tabla)->where('id', $id)->first();
        if ($record) {
            // Eliminar registro
            DB::table($tabla)->where('id', $id)->delete();

            return redirect()->route('dashboard')->with('success', 'Registro eliminado correctamente.');
        } else {

            return redirect()->back()->withErrors(['error' => 'No se encontró el registro para eliminar.']);
        }

        return redirect()->route('dashboard')->with('success', 'Registro actualizado correctamente.');
    }

    public function InsertTable($tabla)
    {
        if (!in_array($tabla, [
            'registros', 'users', 'tablas_sistema', 'autenticacion_usuarios', 'productos', 'proveedores',
        'categorias', 'inventario','ordenes_compra','detalle_orden_compra','ventas','detalle_venta','ajustes_inventario','tipo_documento'
        ])) {
            return redirect()->back()->withErrors(['error' => 'Tabla no permitida']);
        }
        $campos = DB::getSchemaBuilder()->getColumnListing($tabla);

      //  $idTablaInsertar = DB::table($tabla)->where('1=2');
        return view('registro.insert', compact('campos', 'tabla'));
    }

    public function InsertTableBD(Request $request, $tabla)
    {
        $data = $request->except('_token'); // Obtener todos los datos del formulario excepto el token CSRF

        // Insertar los datos en la tabla
        DB::table($tabla)->insert($data);

        return redirect()->route('dashboard')->with('success', 'Registro actualizado correctamente.');
    }
}
