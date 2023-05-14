<?php

namespace App\Models\Comentario;

use App\Classes\Models\Model;
use App\Models\Producto\Producto;
use App\Models\usuario\Usuario;

class Comentario extends Model
{
    // Estados
    const TC_ESTADO = 'TC_ESTADO_COMENTARIOS';
    const ACTIVO    = 1;
    const INACTIVO  = 2;
    const ELIMINADO = 3;

    const MAXIMO_ESTRELLAS = 5;

    const UNA_ESTRELLA    = 1;
    const DOS_ESTRELLA    = 2;
    const TRES_ESTRELLA   = 3;
    const CUATRO_ESTRELLA = 4;
    const CINCO_ESTRELLA  = 5;

    protected $table = "valoraciones_productos";

    /** Campos que pueden ser usados en create/update. */
    protected $fillable = [
        'id_producto',
        'id_usuario',
        'estrellas',
        'comentario',
        'fecha',
        'estado',
    ];

    /** Campos a castear a un tipo de PHP */
    protected $casts = [
        "fecha" => "date:d/m/Y",
        "created_at" => "date:d/m/Y",
        "updated_at" => "date:d/m/Y"
    ];

    protected $dates = [
        "fecha" => "date:d/m/Y ",
        "created_at" => "date:d/m/Y ",
        "updated_at" => "date:d/m/Y ",
    ];

    public function infoEstado()
    {
        return darInfoConcepto($this, self::TC_ESTADO, 'estado')->selectRaw('conceptos.*');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id');
    }
}
