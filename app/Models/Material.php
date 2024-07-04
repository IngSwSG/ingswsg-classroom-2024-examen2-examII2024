<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'materials';
    protected $primaryKey = 'codigo';
    protected $fillable = ['unidadMedida', 'descripcion', 'ubicacion', 'idCategoria'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }
}
