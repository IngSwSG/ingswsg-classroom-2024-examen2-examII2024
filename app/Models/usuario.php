<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuario';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'idUsuario', 'identificacion', 'nombre', 'apellidos', 'telefono', 'unidad_id'
    ];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'unidad_id');
    }

    public function requisicions()
    {
        return $this->hasMany(Requisicion::class, 'usuario_id');
    }
};
