<?php

namespace App\Observers\Pedidos;

use App\Exceptions\ErrorException;
use App\Models\Pedido\DetallePedido;
use App\Models\Producto\Producto;

class DetallePedidoObserver
{
    /**
     * Handle the DetallePedido "created" event.
     *
     * @param  \App\Models\Pedido\DetallePedido  $detallePedido
     * @return void
     */
    public function created(DetallePedido $detallePedido)
    {
        $this->actualizarCantidadProducto($detallePedido);
    }

    /**
     * Handle the DetallePedido "updated" event.
     *
     * @param  \App\Models\Pedido\DetallePedido  $detallePedido
     * @return void
     */
    public function updated(DetallePedido $detallePedido)
    {
        //
    }

    /**
     * Handle the DetallePedido "deleted" event.
     *
     * @param  \App\Models\Pedido\DetallePedido  $detallePedido
     * @return void
     */
    public function deleted(DetallePedido $detallePedido)
    {
        //
    }

    /**
     * Handle the DetallePedido "restored" event.
     *
     * @param  \App\Models\Pedido\DetallePedido  $detallePedido
     * @return void
     */
    public function restored(DetallePedido $detallePedido)
    {
        //
    }

    /**
     * Handle the DetallePedido "force deleted" event.
     *
     * @param  \App\Models\Pedido\DetallePedido  $detallePedido
     * @return void
     */
    public function forceDeleted(DetallePedido $detallePedido)
    {
        //
    }

    public function actualizarCantidadProducto($detallePedido)
    {
        $detallePedido?->load('producto');
        $producto = $detallePedido?->producto;
        $cantidad = $producto?->cantidad - $detallePedido?->cantidad;
        $datos['cantidad'] = $cantidad;
        if ($cantidad <= 0) {
            $datos['estado'] = Producto::INACTIVO;
        }
        $actualizar = $producto->update($datos);
        if (!$actualizar) {
            throw new ErrorException("Ha ocurrido un error al intentar actualizar la cantidad del producto.");
        }
    }
}