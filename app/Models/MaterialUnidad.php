<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialUnidad extends Model
{
    use HasFactory;

    protected $fillable = [
        'IdMaterialUnidad',
        'Cantidad',
        'IdUnidad',
    ];

    public function unidad(){
        return $this->belongsTo(Unidad::class);
    }
}


