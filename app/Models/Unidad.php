<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;

    protected $filliable =['nombre'];

    public function materialesUnidades() 
   {
     return $this->hasMany(MaterialUnidad::class, 'idUnidad'); 
  }

}
