<?php

use Illuminate\Support\Facades\Route;
use App\Models\Ejercicio;

Route::get('/ejercicios', function () {
    return Ejercicio::all();
});
