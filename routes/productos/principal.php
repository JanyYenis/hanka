<?php

use App\Http\Controllers\Productos\ProductoController;
use App\Http\Controllers\Tienda\TiendaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductoController::class, 'index'])
    ->middleware(['web', 'auth'])
    ->name('index');

Route::get('/listado', [ProductoController::class, 'listado'])
    ->middleware(['web', 'auth'])
    ->name('listado');

Route::get('{producto}/editar', [ProductoController::class, 'editar'])
    ->middleware(['web', 'auth'])
    ->name('editar');

Route::put('{producto}/actualizar', [ProductoController::class, 'update'])
    ->middleware(['web', 'auth'])
    ->name('actualizar');

Route::post('/crear', [ProductoController::class, 'store'])
    ->middleware(['web', 'auth'])
    ->name('store');

Route::get('/ver', [TiendaController::class, 'index'])
    ->middleware(['web', 'auth'])
    ->name('ver');

Route::get('/listado-productos', [TiendaController::class, 'listado'])
    ->name('listado-general');

Route::get('/productos', [TiendaController::class, 'index'])
    ->name('ver-productos');