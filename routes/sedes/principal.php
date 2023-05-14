<?php

use App\Http\Controllers\sede\SedeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SedeController::class, 'index'])
    ->name('index');

Route::get('/listado', [SedeController::class, 'listado'])
    ->name('listado');

Route::get('{sede}/editar', [SedeController::class, 'editar'])
    ->name('editar');

Route::put('{sede}/actualizar', [SedeController::class, 'update'])
    ->name('actualizar');

Route::post('/crear', [SedeController::class, 'store'])
    ->name('store');

include "paises.php";