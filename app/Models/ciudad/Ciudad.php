<?php

namespace App\Models\ciudad;

use App\Classes\Models\Model;
use App\Models\pais\Pais;

class Ciudad extends Model
{
    // Estados
    const TC_ESTADO = 'TC_ESTADO_CIUDADES';
    const ACTIVO = 1;
    const INACTIVO = 2;
    const ELIMINADO = 3;

    protected $table = "ciudades";

    /** Campos que pueden ser usados en create/update. */
    protected $fillable = [
        'nombre',
        'id_pais'
    ];

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'id_pais', 'id');
    }

    public function infoEstado()
    {
        return darInfoConcepto($this, self::TC_ESTADO, 'estado')->selectRaw('conceptos.*');
    }
}
