<?php

use App\Http\Controllers\ciudad\CiudadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CiudadController::class, 'index'])
    ->name('index');

Route::get('/listado', [CiudadController::class, 'listado'])
    ->name('listado');

Route::get('{ciudad}/editar', [CiudadController::class, 'editar'])
    ->name('editar');

Route::post('/buscar-ciudades', [CiudadController::class, 'buscarCiudades'])
    ->name('buscar');

Route::get('{pais}/crear', [CiudadController::class, 'create'])
    ->name('create');

Route::post('/agregar', [CiudadController::class, 'store'])
    ->name('store');

Route::put('{ciudad}/actualizar', [CiudadController::class, 'update'])
        ->name('actualizar');