<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::prefix('home')
                ->as("home.")
                // ->namespace("$namespace\Sistema\Areas-interesadas")
                ->middleware(['web', 'auth'])
                ->group(base_path('routes/home/principal.php'));
            
            Route::prefix('admin')
                ->as("admin.")
                ->middleware(['web', 'auth'])
                ->group(base_path('routes/admin/principal.php'));
            
            Route::prefix('usuarios')
                ->as("usuarios.")
                ->middleware(['web', 'auth'])
                ->group(base_path('routes/usuarios/principal.php'));

            Route::prefix('pqrs')
                ->as("pqrs.")
                ->group(base_path('routes/pqrs/principal.php'));
            
            Route::prefix('ciudades')
                ->as("ciudades.")
                ->middleware(['web', 'auth'])
                ->group(base_path('routes/ciudades/principal.php'));
            
            Route::prefix('sedes')
                ->as("sedes.")
                ->middleware(['web', 'auth'])
                ->group(base_path('routes/sedes/principal.php'));
            
            Route::prefix('empleados')
                ->as("empleados.")
                ->middleware(['web', 'auth'])
                ->group(base_path('routes/empleados/principal.php'));
            
            Route::prefix('marcas')
                ->as("marcas.")
                ->middleware(['web', 'auth'])
                ->group(base_path('routes/productos/marcas.php'));
            
            Route::prefix('categorias')
                ->as("categorias.")
                ->middleware(['web', 'auth'])
                ->group(base_path('routes/productos/categorias.php'));
            
            Route::prefix('subcategorias')
                ->as("subcategorias.")
                ->middleware(['web', 'auth'])
                ->group(base_path('routes/productos/subcategorias.php'));
            
            Route::prefix('productos')
                ->as("productos.")
                ->group(base_path('routes/productos/principal.php'));
            
            Route::prefix('pedidos')
                ->as("pedidos.")
                ->middleware(['web', 'auth'])
                ->group(base_path('routes/pedidos/principal.php'));
            
            Route::prefix('terminos-condiciones')
                ->as("terminos.")
                ->group(base_path('routes/terminos/principal.php'));
            
            Route::prefix('comentarios')
                ->as("comentarios.")
                ->group(base_path('routes/comentarios/principal.php'));
                
            Route::prefix('graficos')
                ->as("graficos.")
                ->middleware(['web', 'auth'])
                ->group(base_path('routes/graficos/principal.php'));
            
            Route::prefix('carrito')
                ->as("carrito.")
                ->middleware(['web', 'auth'])
                ->group(base_path('routes/carrito/principal.php'));
            
            Route::prefix('favoritos')
                ->as("favoritos.")
                ->middleware(['web', 'auth'])
                ->group(base_path('routes/favoritos/principal.php'));
                
            // Route::prefix('login')
            //     ->as("login.")
            //     ->group(base_path('routes/auth/principal.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
