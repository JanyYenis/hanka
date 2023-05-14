<?php

use App\Http\Controllers\Favoritos\FavoritoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FavoritoController::class, 'index'])
    ->name('index');

Route::get('/listado', [FavoritoController::class, 'listado'])
    ->name('listado');

Route::post('{producto}/guardar', [FavoritoController::class, 'store'])
    ->name('store');