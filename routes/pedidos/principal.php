<?php

use App\Http\Controllers\Pedidos\PedidoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PedidoController::class, 'index'])
    ->name('index');

Route::get('/listado', [PedidoController::class, 'listado'])
    ->name('listado');

Route::get('{pedido}/editar', [PedidoController::class, 'editar'])
    ->name('editar');

Route::put('{pedido}/actualizar', [PedidoController::class, 'update'])
    ->name('actualizar');

Route::post('/crear', [PedidoController::class, 'store'])
    ->name('store');

Route::get('{pedido}/export-factura', [PedidoController::class, 'exportFactura'])
    ->name('export-factura');

Route::get('/mis-pedidos', [PedidoController::class, 'misPedidos'])
    ->name('mis-pedidos');

Route::get('{productos}/realizar-pedido', [PedidoController::class, 'create'])
    ->name('realizarPedido');