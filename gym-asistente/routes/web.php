<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsistenteController;
use App\Http\Controllers\Admin\SemanaController;
use App\Http\Controllers\Admin\DiaController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/asistente/hoy/{nivel?}', [AsistenteController::class, 'hoy']);
Route::get('/', [AsistenteController::class, 'vista']);
Route::get('/semanas', [AsistenteController::class, 'verSemanas']);
Route::get('/semana/{id}', [AsistenteController::class, 'verSemana']);
Route::prefix('admin')->group(function () {
    Route::resource('semanas', \App\Http\Controllers\Admin\SemanaController::class);
    Route::resource('dias', \App\Http\Controllers\Admin\DiaController::class);
    Route::resource('ejercicios', \App\Http\Controllers\Admin\EjercicioController::class);
});
Route::prefix('admin')->group(function () {
    Route::resource('semanas', SemanaController::class);
    Route::resource('dias', DiaController::class);
});
Route::resource('admin/dias', \App\Http\Controllers\Admin\DiaController::class);
