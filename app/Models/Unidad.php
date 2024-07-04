<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;

    protected $fillable = [
        'IdUnidad',
        'Nombre',
    ];

    public function materialUnidad(){
        return $this->hasMany(MaterialUnidad::class);}
}
