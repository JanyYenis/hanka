const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

/** Prueba */
// mix.js("resources/js/prueba/principal.js", "public/js/prueba/principal.js");

/** Usuarios */
mix.js("resources/js/usuarios/principal.js", "public/js/usuarios/principal.js");
mix.js("resources/js/usuarios/perfil.js", "public/js/usuarios/perfil.js");

/** Login */
mix.js("resources/js/auth/principal.js", "public/js/auth/principal.js");

/** PQRS */
mix.js("resources/js/pqrs/principal.js", "public/js/pqrs/principal.js");

/** Sedes */
mix.js("resources/js/sedes/principal.js", "public/js/sedes/principal.js");

/** Empleados */
mix.js("resources/js/empleados/principal.js", "public/js/empleados/principal.js");

/** Pedidos */
mix.js("resources/js/pedidos/principal.js", "public/js/pedidos/principal.js");
mix.js("resources/js/pedidos/wizard-1.js", "public/js/pedidos/wizard-1.js");

/** Terminos */
mix.js("resources/js/terminos/principal.js", "public/js/terminos/principal.js");

/** Comentarios */
mix.js("resources/js/comentarios/principal.js", "public/js/comentarios/principal.js");

/** Graficos */
mix.js("resources/js/graficos/principal.js", "public/js/graficos/principal.js");

/** Productos */
mix.js("resources/js/productos/principal.js", "public/js/productos/principal.js");
mix.js("resources/js/productos/marcas/principal.js", "public/js/productos/marcas/principal.js");
mix.js("resources/js/productos/categorias/principal.js", "public/js/productos/categorias/principal.js");
mix.js("resources/js/productos/subcategorias/principal.js", "public/js/productos/subcategorias/principal.js");

/** Tienda */
mix.js("resources/js/tienda/carrito.js", "public/js/tienda/carrito.js");
mix.js("resources/js/tienda/favoritos.js", "public/js/tienda/favoritos.js");
mix.js("resources/js/tienda/principal.js", "public/js/tienda/principal.js");
mix.js("resources/js/tienda/bootstrap.bundle.min.js", "public/js/tienda/bootstrap.bundle.min.js");

// ----------------------------------------------------------------------------------------------------
// CSS
mix.styles(
    "resources/css/mis-estilo.css",
    "public/css/mis-estilo.css"
);

mix.styles(
    "resources/css/login.css",
    "public/css/login.css"
);

mix.styles(
    "resources/css/tienda/bootstrap.min.css",
    "public/css/tienda/bootstrap.min.css"
);

mix.styles(
    "resources/css/tienda/custom.css",
    "public/css/tienda/custom.css"
);

mix.styles(
    "resources/css/tienda/templatemo.css",
    "public/css/tienda/templatemo.css"
);

mix.styles(
    "resources/css/tienda/estiloComentario.css",
    "public/css/tienda/estiloComentario.css"
);

mix.styles(
    "resources/css/dataTable/dataTables.css",
    "public/css/dataTable/dataTables.css"
);

mix.styles(
    "resources/css/style.css",
    "public/css/style.css"
);
mix.styles(
    "resources/css/themes/layout/aside/dark.css",
    "public/css/themes/layout/aside/dark.css"
);

mix.styles(
    "resources/css/themes/layout/brand/dark.css",
    "public/css/themes/layout/brand/dark.css"
);

mix.styles(
    "resources/css/themes/layout/header/base/light.css",
    "public/css/themes/layout/header/base/light.css"
);

mix.styles(
    "resources/css/themes/layout/header/menu/light.css",
    "public/css/themes/layout/header/menu/light.css"
);

mix.styles(
    "resources/css/plugins/global/plugins.css",
    "public/css/plugins/global/plugins.css"
);

mix.styles(
    "resources/css/plugins/custom/prismjs/prismjs.css",
    "public/css/plugins/custom/prismjs/prismjs.css"
);

mix.styles(
    "resources/css/plugins/custom/fullcalendar/fullcalendar.css",
    "public/css/plugins/custom/fullcalendar/fullcalendar.css"
);

mix.styles(
    "resources/css/themes/wizard-1.css",
    "public/css/themes/wizard-1.css"
);