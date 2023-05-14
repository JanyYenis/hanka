<?php

use App\Http\Controllers\Comentarios\ComentarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ComentarioController::class, 'index'])
    ->middleware(['web', 'auth'])
    ->name('index');

Route::get('/listado', [ComentarioController::class, 'listado'])
    ->middleware(['web', 'auth'])
    ->name('listado');

Route::get('{producto}/agregar-comentario', [ComentarioController::class, 'create'])
    ->name('create');

Route::post('/crear', [ComentarioController::class, 'store'])
    ->name('store');