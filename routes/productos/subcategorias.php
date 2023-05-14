<?php

use App\Http\Controllers\Productos\SubcategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SubcategoriaController::class, 'index'])
    ->name('index');

Route::get('/listado', [SubcategoriaController::class, 'listado'])
    ->name('listado');

Route::get('{subcategoria}/editar', [SubcategoriaController::class, 'editar'])
    ->name('editar');

Route::put('{subcategoria}/actualizar', [SubcategoriaController::class, 'update'])
    ->name('actualizar');

Route::post('/crear', [SubcategoriaController::class, 'store'])
    ->name('store');

Route::post('/buscar', [SubcategoriaController::class, 'buscarSubcategorias'])
    ->name('buscar');    