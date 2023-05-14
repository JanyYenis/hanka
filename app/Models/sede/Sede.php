<?php

namespace App\Models\sede;

use App\Classes\Models\Model;
use App\Models\ciudad\Ciudad;
use App\Traits\TelefonableTrait;

class Sede extends Model
{
    use TelefonableTrait;

    // Estados
    const TC_ESTADO = 'TC_ESTADO_SEDES';
    const ACTIVO    = 1;
    const INACTIVO  = 2;
    const ELIMINADO = 3;

    const PRINCIPAL    = 1;
    const NO_PRINCIPAL = 0;
    
    protected $table = "sedes";

    /** Campos que pueden ser usados en create/update. */
    protected $fillable = [
        'nombre',
        'direccion',
        'email',
        'principal',
        'estado',
        'id_ciudad'
    ];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad', 'id');
    }

    public function infoEstado()
    {
        return darInfoConcepto($this, self::TC_ESTADO, 'estado')->selectRaw('conceptos.*');
    }
}
