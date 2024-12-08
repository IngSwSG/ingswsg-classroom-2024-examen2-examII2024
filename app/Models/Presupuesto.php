<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    use HasFactory;

    protected $table = 'presupuestos';
    
    protected $primaryKey = 'idPresupuesto';

    protected $fillable = [
        'unidad_id',
        'nombrePresupuesto'
    ];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'unidad_id', 'idUnidad');
    }

    public function materialUnidad()
    {
        return $this->belongsTo(MaterialUnidad::class, 'materialunidad_id', 'id');
    }
}
