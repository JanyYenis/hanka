<?php

namespace App\Observers\Pedidos;

use App\Exceptions\ErrorException;
use App\Models\Pedido\Pedido;

class PedidoObserver
{
    /**
     * Handle the Pedido "created" event.
     *
     * @param  \App\Models\Pedido\Pedido  $pedido
     * @return void
     */
    public function created(Pedido $pedido)
    {
        $this->agregarPuntos($pedido);
    }

    /**
     * Handle the Pedido "updated" event.
     *
     * @param  \App\Models\Pedido\Pedido  $pedido
     * @return void
     */
    public function updated(Pedido $pedido)
    {
        //
    }

    /**
     * Handle the Pedido "deleted" event.
     *
     * @param  \App\Models\Pedido\Pedido  $pedido
     * @return void
     */
    public function deleted(Pedido $pedido)
    {
        //
    }

    /**
     * Handle the Pedido "restored" event.
     *
     * @param  \App\Models\Pedido\Pedido  $pedido
     * @return void
     */
    public function restored(Pedido $pedido)
    {
        //
    }

    /**
     * Handle the Pedido "force deleted" event.
     *
     * @param  \App\Models\Pedido\Pedido  $pedido
     * @return void
     */
    public function forceDeleted(Pedido $pedido)
    {
        //
    }

    public function agregarPuntos($pedido)
    {
        $pedido->load('usuario');
        $usuario = $pedido?->usuario;
        $puntos = $pedido?->usar_puntos ? $pedido?->puntos_compra : $pedido?->puntos_compra + $usuario?->puntos;
        $actualizar = $usuario->update(['puntos' => $puntos]);
        if (!$actualizar) {
            throw new ErrorException("Ha ocurrido un error al intentar actualizar los puntos del usuario.");
        }
    }
}