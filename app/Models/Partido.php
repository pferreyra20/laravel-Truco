<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $table = 'partidos';

    protected $fillable = [
        'fecha',
        'pareja_id1',
        'pareja_id2',
        'partido',
        'puntos_pareja1',
        'puntos_pareja2',
        'cganado1',
        'cganado2',
        'dif_puntos1',
        'dif_puntos2',
        'cfecha',
    ];

    public $timestamps = false;

    public function pareja1()
    {
        return $this->belongsTo(Pareja::class, 'pareja_id1');
    }

    public function pareja2()
    {
        return $this->belongsTo(Pareja::class, 'pareja_id2');
    }
}
