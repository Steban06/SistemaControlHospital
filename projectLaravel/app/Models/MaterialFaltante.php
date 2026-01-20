<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialFaltante extends Model
{
    protected $table = 'materiales_faltantes';

    protected $fillable = [
        'aire_id',
        'nombre_material',
        'cantidad',
        'descripcion',
        'cantidad',
        'prioridad',
        'estado',
        'observaciones',
        'created_at',
        'updated_at',
        'deleted_at'  		
    ];
}
