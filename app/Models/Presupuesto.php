<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $fillable = [
        'CodigoPresupuesto',
        'NombrePresupuesto' ,
    ];
   
    use HasFactory;
}
