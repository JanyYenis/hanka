<?php

use App\Http\Controllers\Reportes\GraficoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GraficoController::class, 'index'])
    ->name('index');

Route::get('{ano}/refrescar', [GraficoController::class, 'refrescar'])
    ->name('refrescar');