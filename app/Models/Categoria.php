<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = ['nombre'];
    
    protected $primaryKey = 'idCategoria';

    public function materiales()
    {
        return $this->hasMany(Material::class, 'idCategoria', 'idCategoria');
    }
}

