<?php

use App\Http\Controllers\pqrs\PqrsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PqrsController::class, 'index'])
    ->middleware(['web', 'auth'])
    ->name('index');

Route::get('/listado', [PqrsController::class, 'listado'])
    ->middleware(['web', 'auth'])
    ->name('listado');

Route::get('{usuario}/crear', [PqrsController::class, 'create'])
    ->name('create');

Route::post('/guardar', [PqrsController::class, 'store'])
    ->name('store');

Route::get('{pqrs}/ver', [PqrsController::class, 'ver'])
    ->middleware(['web', 'auth'])
    ->name('ver');

Route::put('/{pqrs}/responder', [PqrsController::class, 'update'])
    ->middleware(['web', 'auth'])
    ->name('update');

Route::get('/tabla', [PqrsController::class, 'tabla'])
    ->middleware(['web', 'auth'])
    ->name('tabla');