<?php

namespace App\Observers\Usuarios;

use App\Exceptions\ErrorException;
use App\Mail\Usuarios\ClaveMail;
use App\Models\Roles\Rol;
use App\Models\Roles\RolUsuario;
use App\Models\usuario\Usuario;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class UsuarioObserver
{
    /**
     * Handle the Usuario "created" event.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return void
     */
    public function created(Usuario $usuario)
    {
        $this->agregarRol($usuario);
        $this->agregarClave($usuario);
    }

    /**
     * Handle the Usuario "updated" event.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return void
     */
    public function updated(Usuario $usuario)
    {
        //
    }

    /**
     * Handle the Usuario "deleted" event.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return void
     */
    public function deleted(Usuario $usuario)
    {
        //
    }

    /**
     * Handle the Usuario "restored" event.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return void
     */
    public function restored(Usuario $usuario)
    {
        //
    }

    /**
     * Handle the Usuario "force deleted" event.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return void
     */
    public function forceDeleted(Usuario $usuario)
    {
        //
    }

    public function agregarClave($usuario)
    {
        // Mail::to('janytj1207@gmail.com')->send(new Respuesta($usuario)); // El send espera terminar la accion para enviar la respuesta es mejpor usar queue
        Mail::to($usuario?->email)->queue(new ClaveMail($usuario));

        return [
            'estado'  => 'success',
            'mensaje' => 'Se envio el correo para agregar la contraseña.'
        ];
    }

    public function agregarRol($usuario)
    {
        $rol = Role::firstWhere('name', Usuario::ROL_CLIENTE);
        $usuario->syncRoles($rol?->id);
    }
}
