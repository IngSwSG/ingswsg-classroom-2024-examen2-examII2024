<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    use HasFactory;

    protected $primaryKey = 'codigoPresupuesto';

    protected $fillable = [
        'nombrePresupuesto',
    ];

    public function requisiciones()
    {
        return $this->hasMany(Requisicion::class, 'codigoPresupuesto');
    }
};