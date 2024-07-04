<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'nombrePresupuesto'];

    public function unidades()
    {
        return $this->belongsTo(Unidad::class, 'id');
    }

    public function MaterialUnidad()
    {
        return $this->hasMany(MaterialUnidad::class, 'id');
    }

}
