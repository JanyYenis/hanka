<?php

namespace App\Mail\Usuarios;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClaveMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Crear contraseña nuevo usuario.";

    public $usuario;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario)
    {
        
        $this->usuario = $usuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $info ['usuario'] = $this->usuario;
        return $this->view('dashboard.usuarios.emails.clave', $info);
    }
}
