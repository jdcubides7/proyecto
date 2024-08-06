<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\Tipos_Documento;

use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{

    public function registrarVentas(){

        $tiposDocumento = tipos_documento::all();
        $ultimaVentaRegistrada = ventas::orderBy('id','desc')->first();
        $nextId = $ultimaVentaRegistrada ? $ultimaVentaRegistrada->id + 1 : 1;


        return view('registro-ventas.registro-ventas',compact('nextId','tiposDocumento'));
      }

}
