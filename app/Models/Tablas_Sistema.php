<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tablas_Sistema extends Model
{
    use HasFactory;

    protected $table = 'tablas_sistema';
    protected $fillable = ['id','nombre'];
}
