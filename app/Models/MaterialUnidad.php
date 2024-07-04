<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialUnidad extends Model
{
    use HasFactory;

    protected $fillable = ['cantidad', 'unidad_id', 'material_id'];

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id', 'codigo');
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'unidad_id', 'idUnidad');
}
}