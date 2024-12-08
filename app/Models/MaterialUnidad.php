<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialUnidad extends Model
{
    use HasFactory;

    protected $table = 'materialunidad'; 

    protected $fillable = [
        'cantidad',
        'idUnidad',
    ];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'idUnidad', 'idUnidad');
    }

    public function presupuesto()
    {
        return $this->hasOne(Presupuesto::class, 'materialunidad_id', 'id');
    }
}