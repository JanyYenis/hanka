<?php

namespace App\Models\Termino;

use App\Classes\Models\Model;

class TerminoCondicion extends Model
{
    // Estados
    const TC_ESTADO = 'TC_ESTADO_TERMINOS_CONDICIONES';
    const ACTIVO    = 1;
    const INACTIVO  = 2;
    const ELIMINADO = 3;

    const PRINCIPAL    = 1;
    const NO_PRINCIPAL = 0;
    
    protected $table = "terminos_condiciones";

    /** Campos que pueden ser usados en create/update. */
    protected $fillable = [
        'titulo_condicion',
        'texto_condicion',
        'principal',
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
