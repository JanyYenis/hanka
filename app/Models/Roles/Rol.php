<?php

namespace App\Models\Roles;

use App\Classes\Models\Model;

class Rol extends Model
{
    // Estados
    const TC_ESTADO = 'TC_ESTADO_ROLES';
    const ACTIVO    = 1;
    const INACTIVO  = 2;
    const ELIMINADO = 3;

    const ROL_ADMIN   = 1;
    const ROL_CLIENTE = 2;
    
    protected $table = "roles";

    /** Campos que pueden ser usados en create/update. */
    protected $fillable = [
        'nombre',
        'estado'
    ];

    public function rolesUsuarios()
    {
        return $this->hasMany(Ciudad::class, 'id_ciudad', 'id');
    }

    public function rolUsuario()
    {
        return $this->hasOne(Ciudad::class, 'id_ciudad', 'id');
    }

    public function infoEstado()
    {
        return darInfoConcepto($this, self::TC_ESTADO, 'estado')->selectRaw('conceptos.*');
    }
}
