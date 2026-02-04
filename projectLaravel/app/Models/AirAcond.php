<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AirAcond extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'aires_acondicionados';

    protected $casts = [
        'fecha_reporte' => 'datetime',
    ];

    protected $fillable = [
        'numero_bn',
        'nombre_aa',
        'modelo',
        'capacidad',
        'voltaje_rango',
        'refrigerante_tc',
        'presion_alta',
        'presion_baja',
        'estado',
        'especificaciones'
    ];

    public function materialesFaltantes()
    {
        return $this->hasMany(MaterialFaltante::class, 'aire_id');
    }

    public function bienNacional()
    {
        return $this->belongsTo(BN::class, 'numero_bn', 'numero_bn');
    }
}
