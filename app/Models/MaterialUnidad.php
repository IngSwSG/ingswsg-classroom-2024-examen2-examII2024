<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialUnidad extends Model
{
    use HasFactory;

    protected $table = 'material_unidad';

    protected $fillable = ['cantidad', 'idUnidad', 'idMaterial'];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'idUnidad', 'idUnidad');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'idMaterial', 'codigo');
    }
}
