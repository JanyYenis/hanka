<?php

namespace App\Mail\Comentarios;

use App\Models\Comentario\Comentario;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Nuevo comentario.";

    public $comentario;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(/* Comentario */ $comentario)
    {
        $this->comentario = $comentario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $info ['comentario'] = $this->comentario;
        return $this->view('dashboard.comentarios.emails.notificacion', $info);
    }
}
