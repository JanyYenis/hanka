<?php

namespace App\Observers\Pqrs;

use App\Mail\Pqrs\Respuesta;
use App\Models\pqrs\Pqrs;
use Illuminate\Support\Facades\Mail;

class PqrsObserver
{
    /**
     * Handle the Pqrs "created" event.
     *
     * @param  \App\Models\Pqrs  $pqrs
     * @return void
     */
    public function created(Pqrs $pqrs)
    {
        //
    }

    /**
     * Handle the Pqrs "updated" event.
     *
     * @param  \App\Models\Pqrs  $pqrs
     * @return void
     */
    public function updated(Pqrs $pqrs)
    {
        $this->enviarRespuesta($pqrs);
    }

    /**
     * Handle the Pqrs "deleted" event.
     *
     * @param  \App\Models\Pqrs  $pqrs
     * @return void
     */
    public function deleted(Pqrs $pqrs)
    {
        //
    }

    /**
     * Handle the Pqrs "restored" event.
     *
     * @param  \App\Models\Pqrs  $pqrs
     * @return void
     */
    public function restored(Pqrs $pqrs)
    {
        //
    }

    /**
     * Handle the Pqrs "force deleted" event.
     *
     * @param  \App\Models\Pqrs  $pqrs
     * @return void
     */
    public function forceDeleted(Pqrs $pqrs)
    {
        //
    }

    public function enviarRespuesta($pqrs)
    {
        if ($pqrs->wasChanged("estado") && $pqrs?->estado == Pqrs::RESPONDIDO && $pqrs?->medio_notificacion == Pqrs::EMAIL) {
            // Mail::to('janytj1207@gmail.com')->send(new Respuesta($pqrs)); // El send espera terminar la accion para enviar la respuesta es mejor usar queue
            Mail::to($pqrs?->email)->queue(new Respuesta($pqrs));
    
            return [
                'estado'  => 'success',
                'mensaje' => 'Respuesta enviada.'
            ];
        }
    }
}
