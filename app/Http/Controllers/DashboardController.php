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

 // Obtener el nombre de la tabla según el ID
   $nombreTabla = Tablas_Sistema::where('id', $tablaId)->value('nombre_tabla');

 // Validar el nombre de la tabla (para evitar SQL injection)
       if (!in_array($nombreTabla, ['registros', 'users', 'tablas_sistema','autenticacion_usuarios','productos'])) { // Reemplaza con tus nombres de tablas permitidas
           return redirect()->back()->withErrors(['error' => 'Tabla no permitida']);
          }

             // Ejecutar la consulta SQL dinámica
        $resultados = DB::table($nombreTabla)->get();

        $datos = Tablas_Sistema::all();

        return view('dashboard', compact('datos', 'resultados'));
    }
}
