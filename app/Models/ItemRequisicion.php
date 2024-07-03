<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemRequisicion extends Model
{
    use HasFactory;

    protected $table = 'item_requisicion';

    protected $fillable = ['cantidad', 'cantidadAprobada', 'idMaterial', 'idRequisicion'];

    public function material()
    {
        return $this->belongsTo(Material::class, 'idMaterial', 'codigo');
    }

    public function requisicion()
    {
        return $this->belongsTo(Requisicion::class, 'idRequisicion', 'idRequisicion');
    }
}
