<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialUnidad extends Model
{
    use HasFactory;

    protected $primaryKey = 'idMaterialUnidad';

    protected $fillable = [
        'cantidad',
        'idMaterial',
        'idUnidad',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class, 'idMaterial');
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'idUnidad');
    }
};