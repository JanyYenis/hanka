<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Pedidos\PedidoController;
use App\Mail\Pedidos\EnviarFacturaMail;
use App\Mail\Usuarios\ClaveMail;
use App\Models\Pedido\Pedido;
use App\Models\usuario\Usuario;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('index');

Route::get('{producto}/detalle', [HomeController::class, 'detalle'])
    ->name('detalle');

Route::get('/prueba', [HomeController::class, 'prueba'])
    // ->middleware(['web', 'auth'])
    ->name('prueba');

Route::get('/prueba1', function(){
    // $info['pedido'] = Pedido::with('sede','usuario','empleado.usuario')->find(2021);
    // return view('pruebas.factuara', $info);

    // $usuario = Usuario::find(1040);
    // return Mail::to($usuario?->email)->queue(new ClaveMail($usuario));;
    // $usuario = Usuario::find(1000);
    // $pedido = Pedido::find(2284);
    // $pedido->load(
    //     'sede',
    //     'usuario',
    //     'infoTipoPago',
    //     'empleado.usuario',
    //     'detallesPedidos.producto'
    // );

    // $pdf = PedidoController::generarFactura($pedido)->output();

    // Mail::to($usuario?->email)
    //     ->queue(new EnviarFacturaMail($usuario, $pedido, $pdf));
    session(['key' => 'jany']);
    dd(session()->get('key'));
})->name('hola');