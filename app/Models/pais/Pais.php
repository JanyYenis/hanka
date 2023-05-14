<?php

namespace App\Models\pais;

use App\Classes\Models\Model;
use App\Models\ciudad\Ciudad;

class Pais extends Model
{
    // Estados
    const TC_ESTADO = 'TC_ESTADO_PAISES';
    const ACTIVO = 1;
    const INACTIVO = 2;
    const ELIMINADO = 3;

    protected $table = "paises";

    /** Campos que pueden ser usados en create/update. */
    protected $fillable = [
        'nombre',
        'ruta',
        'estado'
    ];

    public function ciudades()
    {
        return $this->hasMany(Ciudad::class, 'id_pais', 'id');
    }
    
    public function ciudad()
    {
        return $this->hasOne(Ciudad::class, 'id_pais', 'id');
    }

    public function infoEstado()
    {
        return darInfoConcepto($this, self::TC_ESTADO, 'estado')->selectRaw('conceptos.*');
    }
}
