<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <div class="brand flex-column-auto" id="kt_aside_brand" kt-hidden-height="65" style="">
        <a href="{{route('admin.index')}}" class="brand-logo">
            <img alt="Logo" src="{{asset('img/LOGO2.png')}}" width="100" height="50">
        </a>
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                        <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"></path>
                        <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"></path>
                    </g>
                </svg>
            </span>
        </button>
    </div>
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="aside-menu my-4 scroll ps ps--active-y" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500" style="height: 566px; overflow: hidden;">
            <ul class="menu-nav">
                <li class="menu-item menu-item-active" aria-haspopup="true">
                    <a href="{{route('admin.index')}}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <i class="flaticon-home-2 icon-lg"></i>
                        </span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <li class="menu-section">
                    <h4 class="menu-text">Tienda</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>

                {{-- Productos --}}
                @component('dashboard.layouts.asides.productos')
                @endcomponent
                
                {{-- Pedidos --}}
                @component('dashboard.layouts.asides.pedidos')
                @endcomponent
                
                <li class="menu-section">
                    <h4 class="menu-text">Valoraciones</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                
                {{-- PQRS --}}
                @component('dashboard.layouts.asides.pqrs')
                @endcomponent

                {{-- Comentarios --}}
                @component('dashboard.layouts.asides.comentarios')
                @endcomponent
                
                <li class="menu-section">
                    <h4 class="menu-text">Logros</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>

                {{-- Reportes --}}
                @component('dashboard.layouts.asides.reportes')
                @endcomponent
                
                {{-- Graficos --}}
                @component('dashboard.layouts.asides.graficos')
                @endcomponent
                
                <li class="menu-section">
                    <h4 class="menu-text">Gestion</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>

                {{-- Sedes --}}
                @component('dashboard.layouts.asides.sedes')
                @endcomponent
                
                <li class="menu-section">
                    <h4 class="menu-text">Configuraciones</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>

                {{-- Usuarios --}}
                @component('dashboard.layouts.asides.usuarios')
                @endcomponent
                
                {{-- Empleados --}}
                @component('dashboard.layouts.asides.empleados')
                @endcomponent
                
                {{-- Roles --}}
                @component('dashboard.layouts.asides.roles')
                @endcomponent
                
                {{-- Terminos y condiciones --}}
                @component('dashboard.layouts.asides.terminos-condiciones')
                @endcomponent
                
            </ul>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; height: 566px; right: 4px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 278px;"></div>
            </div>
        </div>
    </div>
</div>