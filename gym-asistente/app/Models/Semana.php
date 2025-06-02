<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semana extends Model
{
    protected $fillable = ['titulo'];

    public function dias() {
        return $this->hasMany(Dia::class);
    }
}
