<?php

use App\Http\Controllers\Carrito\CarritoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CarritoController::class, 'index'])
    ->name('index');

Route::get('/listado', [CarritoController::class, 'listado'])
    ->name('listado');
    
Route::post('{producto}/guardar', [CarritoController::class, 'store'])
    ->name('store');

Route::get('{carrito}/sumar', [CarritoController::class, 'sumarCantidad'])
    ->name('sumarCantidad');

Route::get('{carrito}/restar', [CarritoController::class, 'restarCantidad'])
    ->name('restarCantidad');