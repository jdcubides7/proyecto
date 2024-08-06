<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $table = 'autenticacion_usuarios';

    protected $fillable = [
        'nombre',
        'tipo_documento_id',
        'numero_documento',
        'telefono',
        'direccion',
        'email',
    ];

    public function tipoDocumento()
    {
        return $this->belongsTo(Tipos_Documento::class, 'tipo_documento_id');
    }


}
