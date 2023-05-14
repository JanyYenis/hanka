<?php

namespace App\Models\Empleado;

use App\Classes\Models\Model;
use App\Models\Empleado\Cargo;
use App\Models\usuario\Usuario;

class Empleado extends Model
{
    
    // Estados
    const TC_ESTADO = 'TC_ESTADO_EMPLEADOS';
    const ACTIVO    = 1;
    const INACTIVO  = 2;
    const ELIMINADO = 3;
    
    protected $table = "empleados";

    /** Campos que pueden ser usados en create/update. */
    protected $fillable = [
        'id_usuario',
        'id_cargo',
        'estado',
    ];

    public function infoEstado()
    {
        return darInfoConcepto($this, self::TC_ESTADO, 'estado')->selectRaw('conceptos.*');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id');
    }
    
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo', 'id');
    }
}
