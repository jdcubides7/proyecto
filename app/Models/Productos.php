<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;


    protected $table = 'productos';

    protected $fillable = [
        'id',
        'nombre',
        'categoria_id',
        'precio',
        'stock',
        'descripcion',
        'created_at',
        'updated_at'
    ];
}
