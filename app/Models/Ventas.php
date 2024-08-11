<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;

    protected $table  = 'ventas';
    protected $fillable = ['id',
    'nombre_cliente',
    'tipo_documento_id',
    'nombre_documento_identidad',
    'numero_documento',
    'telefono_cliente',
    'direccion_cliente',
    'total_venta',
    'fecha_hora',
    'created_at',
    'updated_at'];

}
