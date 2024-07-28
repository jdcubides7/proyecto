<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tablas_Sistema;

class DashboardController extends Controller
{
  // Método para mostrar la vista inicial con los datos
  public function index()
  {

    $idUsuario = auth()->id();
    $nombreUsuario = DB::table('users')->where('id', $idUsuario)->value('name');
    $correo = DB::table('users')->where('id', $idUsuario)->value('email');
    $contraseña = DB::table('users')->where('id', $idUsuario)->value('password');

    //$registroExistente = DB::table('autenticacion_usuarios')->where('id', $idUsuario);
    //$ultimoId = DB::table('autenticacion_usuarios')->max('id');
    //$nuevoId = $ultimoId ? $ultimoId + 1 : 1;
//
    //DB::table('autenticacion_usuarios')->insert([
    //  'id' => $nuevoId,
    //  'id_usuario' => $idUsuario,
    //  'nombre' => $nombreUsuario,
    //  'correo' => $correo,
    //  'contraseña' => $contraseña,
    //  'created_at' => now(),
    //  'updated_at' => now()
    //]);


    //retorna la vista con la informacion de las tablas que hay en base de datos
    $datos = Tablas_Sistema::all();
    return view('dashboard', compact('datos'));
  }

  public function buscar(Request $request)
  {
    $request->validate([
      'tablas' => 'required|integer'
    ]);

    // Buscar los registros basados en el id de la tabla seleccionada
    //   $resultados = Tablas_Sistema::where('id', $request->tablas)->get();


    // Obtener todas las tablas para mostrar en el select
    //  $datos = Tablas_Sistema::all();

    //*****************************************↑OK↑********************************************************************* */

    // Renderizar la vista con los datos y resultados
    // Obtener el ID de la tabla seleccionada
    $tablaId = $request->input('tablas');

    // Obtener el nombre de la tabla según el ID de la tabla almacenado en base de datos
    $nombreTabla = Tablas_Sistema::where('id', $tablaId)->value('nombre_tabla');

    // Validar el nombre de la tabla (para evitar SQL injection)
    if (!in_array($nombreTabla, ['registros', 'users', 'tablas_sistema', 'autenticacion_usuarios', 'productos'])) { // tablas permitidas
      return redirect()->back()->withErrors(['error' => 'Tabla no permitida']);
    }

    // Ejecutar la consulta SQL dinámica para obtener los nombres de las tablas creadas en base de datos
    $resultados = DB::table($nombreTabla)->get();

    $datos = Tablas_Sistema::all();

    return view('dashboard', compact('datos', 'resultados', 'nombreTabla'));
  }



  //    public function edit($id)
  //{
  //    $registro = TuModelo::find($id);
  //    return view('edit', compact('registro'));
  //}
  //




}
