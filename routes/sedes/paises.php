<?php

use App\Http\Controllers\pais\PaisController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'paises/', 'as' => 'paises.'], function () {

    Route::get('/', [PaisController::class, 'index'])
        ->name('index');

    Route::get('/listado', [PaisController::class, 'listado'])
        ->name('listado');

    Route::get('{pais}/editar', [PaisController::class, 'editar'])
        ->name('editar');

    Route::put('{pais}/actualizar', [PaisController::class, 'update'])
        ->name('actualizar');

    Route::post('/crear', [PaisController::class, 'store'])
        ->name('store');

    Route::get('{pais}/ver-ciudades', [PaisController::class, 'verCiudades'])
        ->name('ciudades');
});