<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clientes;

class Tipos_Documento extends Model
{
    use HasFactory;

    protected $table = 'tipos_documento';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function clientes()
    {
        return $this->hasMany(Clientes::class, 'tipo_documento_id');
    }
}
