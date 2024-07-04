<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['identificacion', 'nombre', 'apellidos', 'telefono', 'idUnidad'];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'idUnidad');
    }
}