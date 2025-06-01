<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    protected $fillable = ['dia_id', 'nombre', 'series', 'repeticiones', 'descanso', 'nivel', 'video_url'];

    protected $casts = [
        'nivel' => 'array'
    ];

    public function dia() {
        return $this->belongsTo(Dia::class);
    }
}
