<?php

namespace App\Models\Carrito;

use App\Classes\Models\Model;
use App\Models\Producto\Producto;
use App\Models\usuario\Usuario;

class Carrito extends Model
{
    // Estados
    const TC_ESTADO = 'TC_ESTADO_CARRITO_COMPRAS';
    const ACTIVO    = 1;
    const INACTIVO  = 2;
    const ELIMINADO = 3;
    
    protected $table = "carrito_compras";

    /** Campos que pueden ser usados en create/update. */
    protected $fillable = [
        'id_producto',
        'id_usuario',
        'cantidad',
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

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id');
    }
}
