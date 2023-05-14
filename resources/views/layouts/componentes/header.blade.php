@php
    $usuario = auth()->user() ?? null;
    if ($usuario) {
        $usuario->load('carritosActivos');
        $primeraLetra = substr($usuario?->nombre, 0, 1);
        $carrito = $usuario?->carritosActivos;
        $cantidadCarrito = count($carrito);
    }
    $buscador = $buscador ?? true;
    $notificacion = $notificacion ?? true;
    $lenguaje = $lenguaje ?? true;
@endphp
<!--begin::Header-->
<div id="kt_header" class="header header-fixed">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                <ul class="menu-nav">
                    <a href="{{route('home.index')}}" class="brand flex-column-auto" style="background-color: rgb(255, 255, 255)">
                        <img alt="Logo" src="{{asset('img/LOGO2.png')}}" width="100" height="30">
                    </a>
                    <li class="menu-item menu-item-submenu menu-item-active" data-menu-toggle="click" aria-haspopup="true">
                        <a href="{{route('home.index')}}" class="menu-link">
                            <span class="menu-text"><i class="text-primary flaticon-home-2"></i>&nbsp;Home</span>
                        </a>
                    </li>
                    @if (!auth()->check())
                        <li class="menu-item menu-item-submenu menu-item-active" data-menu-toggle="click" aria-haspopup="true">
                            <a href="{{route('productos.ver-productos')}}" class="menu-link">
                                <span class="menu-text"><i class="text-primary flaticon-layer"></i>&nbsp;Ver productos</span>
                            </a>
                        </li>
                    @elseif (auth()->check())
                        <li class="menu-item menu-item-submenu menu-item-active" data-menu-toggle="click" aria-haspopup="true">
                            <a href="{{route('productos.ver')}}" class="menu-link">
                                <span class="menu-text"><i class="text-primary flaticon-layer"></i>&nbsp;Ver productos</span>
                            </a>
                        </li>
                    @endif
                    <li class="menu-item menu-item-submenu menu-item-active" data-menu-toggle="click" aria-haspopup="true">
                        <a href="javascript:;" class="menu-link btnPqrs" data-crear={{$usuario?->id ?? 0}}>
                            <span class="menu-text"><i class="text-primary flaticon-exclamation-1"></i>&nbsp;PQRS</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="topbar">
            @if ($buscador)
                @component('dashboard.layouts.componentes.componentes-header.buscador')
                @endcomponent
            @endif
            @if ($notificacion && auth()->check())
                @component('dashboard.layouts.componentes.componentes-header.notificaciones')
                @endcomponent
            @endif
            @if (auth()->check())
                <div class="dropdown">
                    <div class="topbar-item">
                        <a href="{{ route('carrito.index') }}">
                            <div class="btn btn-icon btn-clean btn-lg mr-1 position-relative text-decoration-none">
                                <span class="svg-icon svg-icon-xl svg-icon-primary symbol">
                                    <i class="flaticon2-shopping-cart-1 icon-2x"></i>
                                    {{-- <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light">2</span> --}}
                                    @if ($cantidadCarrito)
                                        <i class="symbol-badge bg-primary"></i>
                                    @endif
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            @else
                <div class="dropdown">
                    <div class="topbar-item">
                        <div class="btn btn-icon btn-clean btn-lg mr-1">
                            <span class="svg-icon svg-icon-xl svg-icon-primary">
                                <div class="row">
                                    <a href="{{ route('login') }}"><i class="flaticon2-user icon-2x"></i></a>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            @endif
            @if (auth()->check())
                <div class="topbar-item">
                    <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                        <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{$usuario?->nombre}}</span>
                        <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                            <span class="symbol-label font-size-h5 font-weight-bold">{{$primeraLetra}}</span>
                        </span>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<!--end::Header-->

<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5" kt-hidden-height="40" style="">
        <h3 class="font-weight-bold m-0">Perfil
        <small class="text-muted font-size-sm ml-2">12 messages</small></h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="fas fa-times icon-xl"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5 scroll ps ps--active-y" id="kt_quick_user_content" style="height: 551px; overflow: hidden;">
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label" style="background-image:url({{$usuario?->avatar ?? 'https://media.sproutsocial.com/uploads/2022/06/profile-picture.jpeg'}})"></div>
                <i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{$usuario?->nombre ?? ''}}</a>
                {{-- <div class="text-muted mt-1">Application Developer</div> --}}
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
                                <span class="svg-icon svg-icon-lg svg-icon-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"></path>
                                            <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"></circle>
                                        </g>
                                    </svg>
                                </span>
                            </span>
                            <span class="navi-text text-muted text-hover-primary">{{$usuario?->email ?? ''}}</span>
                        </span>
                    </a>
                    <a href="{{ route('logout') }}" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Salir
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>
        </div>
        <div class="separator separator-dashed mt-8 mb-5"></div>
        <div class="navi navi-spacer-x-0 p-0">
            <a href="{{ route('usuarios.mi-perfil') }}" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <span class="svg-icon svg-icon-md svg-icon-success">
                                <i class="flaticon-user-settings icon-2x text-primary"></i>
                            </span>
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">Mi perfil</div>
                        <div class="text-muted">Actualice sus datos personales 
                            <span class="label label-light-danger label-inline font-weight-bold">update</span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('favoritos.index') }}" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <span class="svg-icon svg-icon-md svg-icon-warning">
                                <i class="flaticon-black icon-xl text-danger"></i>
                            </span>
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">Mis favoritos</div>
                        <div class="text-muted">Productos escogidos como favoritos</div>
                    </div>
                </div>
            </a>
            <a href="{{ route('pedidos.mis-pedidos') }}" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <span class="svg-icon svg-icon-md svg-icon-danger">
                                <i class="flaticon-truck icon-xl"></i>
                            </span>
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">Mis pedidos</div>
                        <div class="text-muted">Pedidos realizados</div>
                    </div>
                </div>
            </a>
            <a href="{{ route('usuarios.configuracion-notificacion') }}" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                <i class="flaticon-email icon-xl"></i>
                            </span>
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">Configuración notificaciones</div>
                        <div class="text-muted">Ajustes para las notificaciones</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="separator separator-dashed my-7"></div>
        <div class="navi navi-spacer-x-0 p-0">
            <a href="#" class="navi-item" href="#" data-toggle="modal" data-target="#kt_chat_modal">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                <i class="flaticon2-chat-1 icon-xl"></i>
                            </span>
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">Chat</div>
                        <div class="text-muted">Ajustes para las notificaciones</div>
                    </div>
                </div>
            </a>
            <a href="#" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                <i class="flaticon-lock icon-xl"></i>
                            </span>
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">Cambiar Contraseña</div>
                        <div class="text-muted">Cambiar mi contraseña</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 551px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 300px;"></div>
        </div>
    </div>
    <!--end::Content-->
</div>

@component('layouts.componentes.chat')
@endcomponent