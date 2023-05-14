<?php

use App\Http\Controllers\Productos\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CategoriaController::class, 'index'])
    ->name('index');

Route::get('/listado', [CategoriaController::class, 'listado'])
    ->name('listado');

Route::get('{categoria}/editar', [CategoriaController::class, 'editar'])
    ->name('editar');

Route::put('{categoria}/actualizar', [CategoriaController::class, 'update'])
    ->name('actualizar');

Route::post('/crear', [CategoriaController::class, 'store'])
    ->name('store');

Route::get('/buscar', [CategoriaController::class, 'buscarCategorias'])
    ->name('buscar');