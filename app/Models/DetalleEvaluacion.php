<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DetalleEvaluacion extends Model
{
    use softDeletes;

    protected $fillable = [
        'criterio',
        'puntaje',
        'evaluacion_id'
    ];
}
