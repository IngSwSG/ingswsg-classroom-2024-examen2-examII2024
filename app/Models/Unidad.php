<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;

    protected $table = 'unidad';

    protected $primaryKey = 'idUnidad'; 

    protected $fillable = [
        'nombre',
    ];

    public function materiales()
    {
        return $this->hasMany(MaterialUnidad::class, 'idUnidad', 'idUnidad');
    }
    public function presupuestos()
    {
        return $this->hasMany(Presupuesto::class, 'unidad_id', 'idUnidad');
    }
}