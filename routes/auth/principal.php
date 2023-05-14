<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])
    ->name('index');

Route::post('/confirmar', [LoginController::class, 'inicioLogin'])
    ->name('confirmar');

// Route::post('/confirmar', [LoginController::class, 'login'])
//     ->name('confirmar');

Route::get('/registro', [RegisterController::class, 'index'])
    ->name('registro');

Route::post('/guardar-registro', [RegisterController::class, 'create'])
    ->name('guardar-registro');