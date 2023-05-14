<?php

namespace App\Mail\Pqrs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Respuesta extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Respuesta PQRS.";

    public $pqrs;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pqrs)
    {
        
        $this->pqrs = $pqrs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $info ['pqrs'] = $this->pqrs;
        return $this->view('pqrs.emails.respuesta', $info);
    }
}