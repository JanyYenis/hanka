<?php

namespace App\Observers\Comentarios;

use App\Exceptions\ErrorException;
use App\Mail\Comentarios\NotificacionMail;
use App\Models\Comentario\Comentario;
use App\Models\sede\Sede;
use Illuminate\Support\Facades\Mail;

class ComentarioObserver
{
    /**
     * Handle the Comentario "created" event.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return void
     */
    public function created(Comentario $comentario)
    {
        $comentario->load('usuario', 'producto');
        $this->notificarComentario($comentario);
    }

    /**
     * Handle the Comentario "updated" event.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return void
     */
    public function updated(Comentario $comentario)
    {
        //
    }

    /**
     * Handle the Comentario "deleted" event.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return void
     */
    public function deleted(Comentario $comentario)
    {
        //
    }

    /**
     * Handle the Comentario "restored" event.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return void
     */
    public function restored(Comentario $comentario)
    {
        //
    }

    /**
     * Handle the Comentario "force deleted" event.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return void
     */
    public function forceDeleted(Comentario $comentario)
    {
        //
    }

    public function notificarComentario(/* Comentario */ $comentario)
    {
        $sede = Sede::firstWhere('principal', Sede::PRINCIPAL);
        Mail::to($sede?->email)->queue(new NotificacionMail($comentario));
    
        return [
            'estado'  => 'success',
            'mensaje' => 'Comentario enviada.'
        ];
    }
}
