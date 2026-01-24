<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'bien_id',
        'tipo',
        'fecha_realizada',
        'tecnico',
        'descripcion',
        'costo',
        'observaciones'
    ];

    protected $casts = [
        'fecha_realizada' => 'date',
        'costo' => 'decimal:2'
    ];

    // Relationship with BN (Bienes Nacionales)
    public function bien()
    {
        return $this->belongsTo(BN::class, 'bien_id');
    }
}
