<?php

use App\Http\Controllers\usuario\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "/usuarios",  "as" => "usuarios."], function () {
    Route::get('/', [UsuarioController::class, 'index'])
        ->name('index');
});