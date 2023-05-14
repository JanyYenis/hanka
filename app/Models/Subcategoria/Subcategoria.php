<?php

namespace App\Models\Subcategoria;

use App\Classes\Models\Model;
use App\Models\categoria\Categoria;

class Subcategoria extends Model
{
    // Estados
    const TC_ESTADO = 'TC_ESTADO_SUBCATEGORIAS';
    const ACTIVO    = 1;
    const INACTIVO  = 2;
    const ELIMINADO = 3;
    
    protected $table = "subcategorias";

    /** Campos que pueden ser usados en create/update. */
    protected $fillable = [
        'nombre',
        'descripcion',
        'id_categoria',
        'estado'
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

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id');
    }
}