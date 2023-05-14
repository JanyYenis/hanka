<?php

namespace App\Models\Marca;

use App\Classes\Models\Model;

class Marca extends Model
{
    // Estados
    const TC_ESTADO = 'TC_ESTADO_MARCAS';
    const ACTIVO    = 1;
    const INACTIVO  = 2;
    const ELIMINADO = 3;
    
    protected $table = "marcas";

    /** Campos que pueden ser usados en create/update. */
    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
    ];

    /** Campos a castear a un tipo de PHP */
    protected $casts = [
        "created_at" => "date:d/m/Y",
        "updated_at" => "date:d/m/Y"
    ];

    protected $dates = [
        "created_at" => "date:d/m/Y ",
        "updated_at" => "date:d/m/Y ",
    ];

    public function infoEstado()
    {
        return darInfoConcepto($this, self::TC_ESTADO, 'estado')->selectRaw('conceptos.*');
    }
}
