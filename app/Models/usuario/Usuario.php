<?php

namespace App\Models\usuario;

use App\Classes\Models\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Carrito\Carrito;
use App\Models\ciudad\Ciudad;
use Spatie\Permission\Traits\HasRoles;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasRoles;

    // Roles
    const ROL_ADMINISTRADOR = 'admin';
    const ROL_CLIENTE       = 'cliente';

    // Permisos
    const PERMISO_LISTADO   = 'usuarios.listado';
    const PERMISO_CREAR     = 'usuarios.crear';
    const PERMISO_EDITAR    = 'usuarios.editar';
    const PERMISO_ELIMINAR  = 'usuarios.eliminar';

    // Estados
    const TC_ESTADO = 'TC_ESTADO_USUARIO';
    const ACTIVO    = 1;
    const INACTIVO  = 2;
    const ELIMINADO = 3;

    const TC_TIPO_GENERO = "TC_TIPO_GENERO_USUARIO";
    const MASCULINO      = 1;
    const FEMENINO       = 2;
    const OTRO           = 3;
    
    const TC_TIPO_DOCUMENTO = "TC_TIPO_DOCUMENTO_USUARIO";
    const CC                = 1;
    const CE                = 2;
    const LM                = 3;
    const PA                = 4;
    
    protected $table = "usuarios";

    /** Campos que pueden ser usados en create/update. */
    protected $fillable = [
        'documento',
        'tipo_documento',
        'nombre',
        'apellido',
        'genero',
        'fecha_nacimiento',
        'telefono',
        'direccion',
        'email',
        'password',
        'puntos',
        'estado',
        'external_id',
        'external_auth',
        'avatar',
        'id_ciudad'
    ];

    protected $hidden = ['password', 'remember_token'];

    /** Campos a castear a un tipo de PHP */
    protected $casts = [
        "fecha_nacimiento" => "date:d/m/Y"
    ];

    protected $dates = [
        "fecha_nacimiento" => "date:d/m/Y ",
    ];


    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad', 'id');
    }

    public static function darTipoGenero($infoTipoConcepto = true)
    {
        return darConceptos(self::TC_TIPO_GENERO, $infoTipoConcepto);
    }
    
    public static function darTipoDocumento($infoTipoConcepto = true)
    {
        return darConceptos(self::TC_TIPO_DOCUMENTO, $infoTipoConcepto);
    }

    public function infoEstado()
    {
        return darInfoConcepto($this, self::TC_ESTADO, 'estado')->selectRaw('conceptos.*');
    }
    public function infoGenero()
    {
        return darInfoConcepto($this, self::TC_TIPO_GENERO, 'genero')->selectRaw('conceptos.*');
    }
    public function infoDocumento()
    {
        return darInfoConcepto($this, self::TC_TIPO_DOCUMENTO, 'tipo_documento')->selectRaw('conceptos.*');
    }

    public function carritos()
    {
        return $this->hasMany(Carrito::class, 'id_usuario', 'id');
    }

    public function carritosActivos()
    {
        return $this->carritos()->where('estado', Carrito::ACTIVO);
    }
}
