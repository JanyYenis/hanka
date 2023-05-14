<?php

namespace App\Classes\Models;

use App\Exceptions\ErrorException;
use App\Traits\Modelable;
use App\Traits\TelefonableTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model as ModelOriginal;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;

abstract class User extends ModelOriginal implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;

    use TelefonableTrait, Modelable;

    use  Notifiable;

    /** Constante que indica el tipo concepto de estado. */
    const TC_ESTADO = "";

    /** Tipo conceptos de tipos de usuario */
    const TC_TIPO_USUARIO = "TC_TIPO_USUARIO";
    const USUARIOS = 1;
    const INSTITUCIONES = 2;


    const LONGITUD_MINIMA_CLAVE = 13;

    const DATOS_NO_ACTUALIZADOS = 0;
    const DATOS_ACTUALIZADOS = 1;

    /** Permite dar todas las opciones de configuración validas. */
    const OPCIONES_VALIDAS = [
        self::MAIL_NOTIFICACIONES,
        self::MAIL_RECUPERACION
    ];

    const MAIL_NOTIFICACIONES = 'email_notificaciones';
    const MAIL_RECUPERACION = "email_recuperacion";

    /**
     * Create a new Eloquent model instance.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * Función que permite obtener el nombre de la clase actual, el cual contiene
     * también la ruta a esta clase.
     * @return string Retorna un string con el nombre de la clase y la ruta.
     */
    public function darClase()
    {
        return get_class($this);
    }

    /**
     * Función que permite obtener el nombre de la clase actual de manera estática.
     * @return string Retorna un string con el nombre de la clase y la ruta.
     */
    public static function darClaseEstatica()
    {
        return static::class;
    }

    /**
     * Función que permite obtener los tipos de usuario.
     * @return \Illuminate\Support\Collection Retorna una colección.
     */
    public static function darTiposUsuario($infoTipo = true)
    {
        return darConceptos(self::TC_TIPO_USUARIO, $infoTipo);
    }

    /**
     *
     */
    // public function emailsNotificaciones()
    // {
    //     $emailNotificacion = $this->settings(self::MAIL_NOTIFICACIONES);
    //     if (empty($emailNotificacion)) {
    //         $emailNotificacion = $this->emailsPrincipales();
    //     }
    //     return $emailNotificacion;
    // }

    /**
     * Función que retorna los correos electrónicos del usuario disponibles para
     * recuperar la contraseña. En caso de que no tenga, retorna los correos
     * principales para la recuperación.
     * @return array Retorna un array con todos los correos disponibles de recuperación, o los principales si no se ha definido.
     */
    // public function emailsRecuperacion()
    // {
    //     $emailRecuperacion = $this->settings(self::MAIL_RECUPERACION);
    //     if (empty($emailRecuperacion)) {
    //         $emailRecuperacion = $this->emailsNotificaciones();
    //     }
    //     return $emailRecuperacion;
    // }

    /**
     * Función que permite verificar si los datos del usuario están actualizados.
     * @return bool Retorna un boolean
     */
    // public function verificarDatosActualizados()
    // {
    //     $correos = $this->emailsVerificados()->exists();
    //     $telefonos = $this->telefonosVerificados()->exists();
    //     $correosNotificacion = $this->settings(self::MAIL_NOTIFICACIONES) ?? [];

    //     $todoActualizado = $correos && $telefonos && count($correosNotificacion) >= 1 ? self::DATOS_ACTUALIZADOS : self::DATOS_NO_ACTUALIZADOS;

    //     $actualizado = $this->update(["datos_actualizados" => $todoActualizado]);
    //     if (!$actualizado) {
    //         throw new ErrorException("No se pudo verificar que tus datos de contacto fueron actualizados.");
    //     }
    //     return $todoActualizado;
    // }

    /**
     * The channels the user receives notification broadcasts on.
     *
     * @return string
     */
    public function receivesBroadcastNotificationsOn()
    {
        return "{$this->getTable()}.{$this->id}";
    }

    /**
     * Función que permite obtener los correos que serán
     * usados para las notificaciones de Laravel.
     * @return array Retorna un array de correos.
     */
    // public function routeNotificationForMail()
    // {
    //     return $this->emailsNotificaciones();
    // }
}
