<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Area;
use App\Models\Categoria;

class BN extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = "bienes_nacionales";
    
    protected $fillable = [
        'numero_bn',
        'nombre',
        'marca',
        'modelo',
        'serial',
        'area_id',
        'categoria_id',
        'estado'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
