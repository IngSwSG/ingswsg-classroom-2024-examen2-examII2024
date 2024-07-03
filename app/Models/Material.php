<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [
        'Unidad De Medida',
        'Descripcion',
        'Ubicacion',
        'idCategoria'

    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

}
