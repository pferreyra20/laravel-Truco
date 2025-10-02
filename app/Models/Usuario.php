<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios'; // Asegurate de que coincida con tu tabla

    protected $fillable = [
        'nombre', 'password', 'id_permiso',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function permiso()
    {
        return $this->belongsTo(Permiso::class);
    }
}
