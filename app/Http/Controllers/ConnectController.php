<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use App\Models\Tablas_Sistema;


use Illuminate\Support\Facades\DB;

class ConnectController extends Controller
{
    public function getIngreso() {
       // $datos = Tablas_Sistema::all();
        return view ('connect.ingreso');//, compact('datos'));
    }

    public function getSeccionInicio () {
        return view ('connect.seccion-inicio');
    }

    public function getRegistro() {
        return view ('connect.registro');
    }

}