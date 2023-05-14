<?php

namespace App\Models\Producto;

use App\Classes\Models\Model;

class ImagenProducto extends Model
{
    // Estados
    const TC_ESTADO = 'TC_ESTADO_IMAGENES_PRODUCTOS';
    const ACTIVO    = 1;
    const INACTIVO  = 2;
    const ELIMINADO = 3;

    const PRINCIPAL    = 1;
    const NO_PRINCIPAL = 0;
    
    protected $table = "imagenes_productos";

    /** Campos que pueden ser usados en create/update. */
    protected $fillable = [
        'id_producto',
        'ruta_imagen',
        'principal',
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

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id');
    }
}