<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    protected $table = 'vista_clasificacion';

    // Como es una vista, no tiene clave primaria ni timestamps
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'jugador_id',
        'nombre_completo',
        'ganados',
        'perdidos',
        'difpartidos',
        'puntos_ganados',
        'puntos_perdidos',
        'diferencia_partidos',
    ];
}
