<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    protected $table = 'jugador';
    public $timestamps = false;

    protected $fillable = ['nombre', 'apellido'];
}
