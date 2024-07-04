<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisicion extends Model
{
   
    protected $fillable = [
        'IdRequisicion',
    'fecha',
    'estado',
    ];
   

    use HasFactory;
}
