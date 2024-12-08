<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $primaryKey = 'codigo';
    
    protected $fillable = [
        'unidadMedida',
        'descripcion', 
        'ubicacion', 
        'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'idCategoria');
    }
    public function path(){
        return '/materiales/'. $this->codigo;
    }
}
