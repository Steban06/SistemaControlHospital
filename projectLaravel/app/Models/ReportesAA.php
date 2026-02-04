<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportesAA extends Model
{
    protected $table = 'reportes_aa';

    protected $fillable = [
        'aire_id',
        'trabajo_realizado',
        'descripcion_intervencion',
        'tecnico_responsable',
        'fecha_reporte',
    ];

    // public function airAcond()
    // {
    //     return $this->belongsTo(AirAcond::class, 'air_acond_id');
    // }
}
