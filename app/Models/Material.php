<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'unidadMedida', 'descripcion', 'ubicacion', 'idCategoria'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }

    public function materialUnidad()
    {
        return $this->hasMany(MaterialUnidad::class, 'idMaterial');
    }
}