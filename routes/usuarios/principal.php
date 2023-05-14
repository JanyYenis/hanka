<?php

use App\Http\Controllers\usuario\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UsuarioController::class, 'index'])
    ->name('index');

Route::get('/listado', [UsuarioController::class, 'listado'])
    ->name('listado');

Route::get('{usuario}/editar', [UsuarioController::class, 'editar'])
    ->name('editar');

Route::put('{usuario}/actualizar', [UsuarioController::class, 'update'])
    ->name('actualizar');

Route::get('{telefono}/editar-telefono', [UsuarioController::class, 'editarTelefono'])
    ->name('editarTelefono');

Route::put('{telefono}/actualizar-telefono', [UsuarioController::class, 'actualizarTelefono'])
    ->name('actualizarTelefono');

Route::post('/guardar-contacto', [UsuarioController::class, 'guardarContacto'])
    ->name('guardarContacto');

Route::post('/crear', [UsuarioController::class, 'store'])
    ->name('store');

Route::get('/buscar-paises', [UsuarioController::class, 'buscarPaises'])
    ->name('buscar-paises');

Route::get('/{usuario}/crear-clave', [UsuarioController::class, 'crearClave'])
    ->name('crear-clave');

Route::get('/buscar-usuarios', [UsuarioController::class, 'buscarUsuarios'])
    ->name('buscarUsuarios');

Route::delete('{usuario}/eliminar', [UsuarioController::class, 'delete'])
    ->name('delete');

Route::get('/mi-perfil', [UsuarioController::class, 'miPerfil'])
    ->name('mi-perfil');

Route::get('/configuracion-notificacion', [UsuarioController::class, 'configuracionNotificacion'])
    ->name('configuracion-notificacion');

Route::get('/refrescar-seccion-telefono', [UsuarioController::class, 'refrescarSeccionTelefono'])
    ->name('refrescar-seccion-telefono');

Route::get('/perfil', [UsuarioController::class, 'miPerfilAdmin'])
    ->name('admin-mi-perfil');