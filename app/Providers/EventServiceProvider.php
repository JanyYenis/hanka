<?php

namespace App\Providers;

use App\Models\Comentario\Comentario;
use App\Models\Pedido\DetallePedido;
use App\Models\Pedido\Pedido;
use App\Models\pqrs\Pqrs;
use App\Models\usuario\Usuario;
use App\Observers\Comentarios\ComentarioObserver;
use App\Observers\Pedidos\DetallePedidoObserver;
use App\Observers\Pedidos\PedidoObserver;
use App\Observers\Pqrs\PqrsObserver;
use App\Observers\Usuarios\UsuarioObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Pqrs::observe(PqrsObserver::class);
        Usuario::observe(UsuarioObserver::class);
        Comentario::observe(ComentarioObserver::class);
        Pedido::observe(PedidoObserver::class);
        DetallePedido::observe(DetallePedidoObserver::class);
    }
}
