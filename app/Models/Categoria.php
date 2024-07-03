<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $timestamps = false;
    protected $table = 'categorias';
    protected $primaryKey = 'idCategoria';
    protected $fillable = ['nombre'];

    public function materials()
    {
        return $this->hasMany(Material::class, 'categoria_id', 'idCategoria');
    }
}

