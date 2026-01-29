<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportesBN extends Model
{
    protected $table = 'reportes_bn';

    protected $fillable = [
        'bienes_nacional_id',	
        'titulo',
        'descripcion',
        'tipo',
        'estado',
    ];
}
