<?php

use App\Http\Controllers\Terminos\TerminoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TerminoController::class, 'index'])
    ->middleware(['web', 'auth'])
    ->name('index');

Route::get('/listado', [TerminoController::class, 'listado'])
    ->middleware(['web', 'auth'])
    ->name('listado');

Route::get('{termino}/editar', [TerminoController::class, 'editar'])
    ->middleware(['web', 'auth'])
    ->name('editar');

Route::put('{termino}/actualizar', [TerminoController::class, 'update'])
    ->middleware(['web', 'auth'])
    ->name('actualizar');

Route::post('/crear', [TerminoController::class, 'store'])
    ->middleware(['web', 'auth'])
    ->name('store');

Route::get('/ver', [TerminoController::class, 'ver'])
    ->middleware(['web', 'auth'])
    ->name('ver');