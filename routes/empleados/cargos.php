<?php

use App\Http\Controllers\Empleados\CargoController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cargos/', 'as' => 'cargos.'], function () {

    Route::get('/', [CargoController::class, 'index'])
        ->name('index');

    Route::get('/listado', [CargoController::class, 'listado'])
        ->name('listado');

    Route::get('{cargo}/editar', [CargoController::class, 'editar'])
        ->name('editar');

    Route::put('{cargo}/actualizar', [CargoController::class, 'update'])
        ->name('actualizar');

    Route::post('/crear', [CargoController::class, 'store'])
        ->name('store');

    Route::get('{cargo}/ver-ciudades', [CargoController::class, 'verCiudades'])
        ->name('ciudades');
});