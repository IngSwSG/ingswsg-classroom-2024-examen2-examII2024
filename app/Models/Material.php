<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materiales';

    protected $primaryKey = 'codigo';

    protected $fillable = ['codigo', 'unidadMedida', 'descripcion', 'ubicacion', 'idCategoria'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria', 'idCategoria');
    }

    public function itemsRequisicion()
    {
        return $this->hasMany(ItemRequisicion::class, 'idMaterial', 'codigo');
    }

    public function materialUnidades()
    {
        return $this->hasMany(MaterialUnidad::class, 'idMaterial', 'codigo');
    }
}
