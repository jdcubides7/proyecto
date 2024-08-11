<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Venta extends Model
{
    use HasFactory;

    protected $table  = 'detalle_venta';
    protected $fillable = ['id','venta_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'total',
        'created_at',
        'updated_at'];
}
