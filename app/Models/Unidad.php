<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'presupuesto_id'];

    public function materialUnidads()
    {
        return $this->hasMany(MaterialUnidad::class, 'unidad_id', 'idUnidad');
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'unidad_id', 'idUnidad');
    }

    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class, 'presupuesto_id', 'codigoPresupuesto');
    }
}