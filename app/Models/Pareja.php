<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pareja extends Model
{
    protected $table = 'parejas';
    protected $fillable = ['pareja1', 'pareja2', 'pareja3', 'pareja4'];
    public $timestamps = false;
}
