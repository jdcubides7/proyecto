<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autenticacion_Usuarios extends Model
{
    use HasFactory;

    protected $table = 'autenticacion_usuarios';
    protected $fillable = ['id','nombre','correo','contraseña','created_at','updated_at'];
}
