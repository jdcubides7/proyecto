<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Inventario extends Controller
{
    public function inventario(){

        return view ('registro-inventario.registro-inventario');
    }
}
