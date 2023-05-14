<?php

namespace App\Models\Producto;

use App\Classes\Models\Model;
use App\Models\Comentario\Comentario;
use App\Models\Marca\Marca;
use App\Models\Subcategoria\Subcategoria;

class Producto extends Model
{
    // Estados
    const TC_ESTADO = 'TC_ESTADO_PRODUCTOS';
    const ACTIVO    = 1;
    const INACTIVO  = 2;
    const ELIMINADO = 3;
    
    protected $table = "productos";

    /** Campos que pueden ser usados en create/update. */
    protected $fillable = [
        'nombre_producto',
        'precio_venta',
        'cantidad',
        'descripcion',
        'calificacion',
        'oferta',
        'descuento',
        'iva',
        'garantia',
        'id_subcategoria',
        'id_marca',
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

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class, 'id_subcategoria', 'id');
    }
    
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'id_marca', 'id');
    }

    public function imagenPrincipal()
    {
        return $this->hasOne(ImagenProducto::class, 'id_producto', 'id')
            ->where('principal', ImagenProducto::PRINCIPAL);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_producto', 'id');
    }

    public function comentario()
    {
        return $this->hasOne(Comentario::class, 'id_producto', 'id');
    }

    public function valoAPagar(int $cantidad)
    {
        $valor = $cantidad * $this->precio_venta;
        $descuento = ((($this->precio_venta * $this->descuento) / 100) * $cantidad);
        $valor = $valor - $descuento;
        return $valor;
    }
}