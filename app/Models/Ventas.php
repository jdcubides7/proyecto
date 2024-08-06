<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;

    protected $table  = 'ventas';
    protected $fillable = ['id','fecha','total','created_at','updated_at'];

}
