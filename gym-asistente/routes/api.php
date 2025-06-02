<?php
use App\Http\Controllers\UserController;

Route::get('/usuarios', [UserController::class, 'index']); // Listar usuarios (opcional)
Route::post('/usuarios', [UserController::class, 'store']); // Crear usuario
