<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permisos';

    public $timestamps = false;

    protected $fillable = ['descripcion'];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_permiso');
    }
}

