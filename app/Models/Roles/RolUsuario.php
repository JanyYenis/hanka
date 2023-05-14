<?php

namespace App\Models\Roles;

use App\Models\usuario\Usuario;
use Illuminate\Database\Eloquent\Model;

class RolUsuario extends Model
{
    // Estados
    const TC_ESTADO = 'TC_ESTADO_ROLES_USUARIOS';
    const ACTIVO    = 1;
    const INACTIVO  = 2;
    const ELIMINADO = 3;
    
    protected $table = "roles_usuarios";

    /** Campos que pueden ser usados en create/update. */
    protected $fillable = [
        'id_usuario',
        'id_rol',
        'estado'
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol', 'id');
    }
    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id');
    }

    public function infoEstado()
    {
        return darInfoConcepto($this, self::TC_ESTADO, 'estado')->selectRaw('conceptos.*');
    }
}
