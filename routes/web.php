<?php

use App\Models\usuario\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

include 'home/principal.php';

Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/google-callback', function () {
    $usuario = Socialite::driver('google')->user();
    $datos = $usuario?->user ?? null;
    $nombre = $datos['given_name'] ?? $usuario?->name;
    $apellido = $datos['family_name'] ?? $usuario?->name;

    $validarUsuario = Usuario::where([
        'external_id'   => $usuario?->id,
        'external_auth' => 'google'
    ])->first();
    
    if ($validarUsuario) {
        Auth::login($validarUsuario);

        return redirect(route('home.index'));
    } else {
        $usuarioNuevo = Usuario::create([
            'nombre'        => $nombre,
            'apellido'      => $apellido,
            'email'         => $usuario?->email,
            'avatar'        => $usuario?->avatar,
            'external_id'   => $usuario?->id,
            'external_auth' => 'google'
        ]);
        Auth::login($usuarioNuevo);
    }

    return redirect(route('usuarios.mi-perfil'));
});