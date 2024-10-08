<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria_Producto extends Model
{
    use HasFactory;

    protected $table = 'categorias';
    protected $fillable = ['id','nombre','descripcion','created_at','updated_at'];
}
