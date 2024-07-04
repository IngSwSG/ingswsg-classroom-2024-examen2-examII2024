<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisicion extends Model
{
    use HasFactory;

    protected $primaryKey = 'idRequisicion';

    protected $fillable = [
        'fecha',
        'estado',
    ];

    public function items()
    {
        return $this->hasMany(ItemRequisicion::class, 'requisicion_id', 'idRequisicion');
    }
}
