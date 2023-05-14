<?php

namespace App\Mail\Pedidos;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarFacturaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Factura.";

    public $pedido;
    public $usuario;
    public $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario, $pedido, $pdf)
    {
        
        $this->pedido = $pedido;
        $this->usuario = $usuario;
        $this->pdf = base64_encode($pdf);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $info ['pedido'] = $this->pedido;
        $info ['usuario'] = $this->usuario;
        return $this->view('tienda.pedidos.emails.envio-factura', $info)
            ->attachData(base64_decode($this?->pdf), "Factura_{$this->pedido?->indicador}.pdf", [
                'mime' => 'application/pdf'
            ]);
    }
}