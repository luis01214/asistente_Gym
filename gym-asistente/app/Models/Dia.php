<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    protected $fillable = ['semana_id', 'nombre', 'grupo_muscular'];

    public function semana() {
        return $this->belongsTo(Semana::class);
    }

    public function ejercicios() {
        return $this->hasMany(Ejercicio::class);
    }
}
