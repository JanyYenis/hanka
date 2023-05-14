<?php

use App\Http\Controllers\Productos\MarcaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MarcaController::class, 'index'])
    ->name('index');

Route::get('/listado', [MarcaController::class, 'listado'])
    ->name('listado');

Route::get('{marca}/editar', [MarcaController::class, 'editar'])
    ->name('editar');

Route::put('{marca}/actualizar', [MarcaController::class, 'update'])
    ->name('actualizar');

Route::post('/crear', [MarcaController::class, 'store'])
    ->name('store');

Route::get('/buscar', [MarcaController::class, 'buscarMarcas'])
    ->name('buscar');