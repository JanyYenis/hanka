<?php

use App\Http\Controllers\Empleados\CargoController;
use App\Http\Controllers\Empleados\EmpleadoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmpleadoController::class, 'index'])
    ->name('index');

Route::get('/listado', [EmpleadoController::class, 'listado'])
    ->name('listado');

Route::get('{empleado}/editar', [EmpleadoController::class, 'editar'])
    ->name('editar');

Route::put('{empleado}/actualizar', [EmpleadoController::class, 'update'])
    ->name('actualizar');

Route::post('/crear', [EmpleadoController::class, 'store'])
    ->name('store');

Route::get('/buscar-cargos', [CargoController::class, 'buscarCargos'])
    ->name('buscarCargos');

include 'cargos.php';