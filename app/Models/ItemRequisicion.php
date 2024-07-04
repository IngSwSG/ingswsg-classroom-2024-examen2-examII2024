<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemRequisicion extends Model
{
    protected $fillable = [
        'IdItemRequisicion',
        'Cantidad',
        'CantidadAprobada',
    ];
    use HasFactory;
}
