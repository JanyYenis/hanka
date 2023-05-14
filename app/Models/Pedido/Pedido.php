<?php

namespace App\Models\Pedido;

use App\Classes\Models\Model;
use App\Models\Empleado\Empleado;
use App\Models\sede\Sede;
use App\Models\usuario\Usuario;

class Pedido extends Model
{
    // Estados
    const TC_ESTADO = 'TC_ESTADO_PEDIDOS';
    const POR_PAGAR = 1;
    const PAGADO    = 2;
    const ELIMINADO = 3;
    
    const TC_TIPO_PAGO = 'TC_TIPO_PAGO_PEDIDOS';
    const PASARELA     = 1;
    const TARJETA      = 2;
    const EFECTIVO     = 3;
    
    protected $table = "pedidos";

    /** Campos que pueden ser usados en create/update. */
    protected $fillable = [
        'indicador',
        'tipo_pago',
        'puntos_compra',
        'usar_puntos',
        'fecha_pedido',
        'direccion',
        'total',
        'id_usuario',
        'id_empleado',
        'id_sede',
        'estado'
    ];

    /** Campos a castear a un tipo de PHP */
    protected $casts = [
        "fecha_pedido" => "date:d/m/Y",
        "created_at" => "date:d/m/Y",
        "updated_at" => "date:d/m/Y"
    ];

    protected $dates = [
        "fecha_pedido" => "date:d/m/Y ",
        "created_at" => "date:d/m/Y ",
        "updated_at" => "date:d/m/Y ",
    ];

    public function infoEstado()
    {
        return darInfoConcepto($this, self::TC_ESTADO, 'estado')->selectRaw('conceptos.*');
    }
    
    public function infoTipoPago()
    {
        return darInfoConcepto($this, self::TC_TIPO_PAGO, 'tipo_pago')->selectRaw('conceptos.*');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado', 'id');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id');
    }

    public function detallesPedidos()
    {
        return $this->hasMany(DetallePedido::class, 'id_pedido', 'id');
    }

    public function detallePedido()
    {
        return $this->hasOne(DetallePedido::class, 'id_pedido', 'id');
    }

    public static function darTipo($infoTipoConcepto = true)
    {
        return darConceptos(self::TC_TIPO_PAGO, $infoTipoConcepto);
    }
}