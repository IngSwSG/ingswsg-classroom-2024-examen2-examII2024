<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemRequisicion extends Model
{
    use HasFactory;

    protected $primaryKey = 'idItemRequisicion';

    protected $fillable = [
        'cantidad',
        'cantidadAprobada',
        'requisicion_id',
        'material_id',
    ];

    public function requisicion()
    {
        return $this->belongsTo(Requisicion::class, 'requisicion_id', 'idRequisicion');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id', 'codigo');
    }
    
}
