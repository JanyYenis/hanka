<!DOCTYPE html>
<html lang="en">

<head>
    <title>HANKA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="apple-touch-icon" href="{{ asset('img/hanka_logo.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/hanka_logo.ico') }}">
    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
    <link rel="stylesheet" href="{{ mix('css/themes/layout/aside/dark.css') }}">
    <link rel="stylesheet" href="{{ mix('css/themes/layout/brand/dark.css') }}">
    <link rel="stylesheet" href="{{ mix('css/themes/layout/header/base/light.css') }}">
    <link rel="stylesheet" href="{{ mix('css/themes/layout/header/menu/light.css') }}">
    <link rel="stylesheet" href="{{ mix('css/plugins/global/plugins.css') }}">
    <link rel="stylesheet" href="{{ mix('css/plugins/custom/prismjs/prismjs.css') }}">
    <link rel="stylesheet" href="{{ mix('css/plugins/custom/fullcalendar/fullcalendar.css') }}">
    
    <link rel="stylesheet" href="{{ mix('css/tienda/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/tienda/templatemo.css') }}">
    <link rel="stylesheet" href="{{ mix('css/tienda/custom.css') }}">
    
</head>
<style>
    .selection .select2-selection.select2-selection--single{
        height: 40px;
        width: 100%;
    }
</style>
<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="#">info@adsi185.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="">305 222 42 49</a>
                </div>
                <div>
                    <a class="text-light" href="https://www.facebook.com/" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://z-p15.www.instagram.com/accounts/login/?next=/p/CK8SOUgBxgo/&hl=es-la" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiZXMifQ%3D%3D%22%7D" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            @yield('logo')

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home.index')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Shop.php">Ver Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btnPqrs" href="#" data-crear=1000>PQRS</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="search" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="{{route('admin.index')}}">
                    {{-- <a class="nav-icon position-relative text-decoration-none" href="{{route('login.index')}}"> --}}
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="text-success">Login</span>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    @section('modal')
        <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="w-100 pt-1 mb-5 text-right">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="shop.php" method="GET" class="modal-content modal-body border-0 p-0">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="inputModalSearch" name="Buscar" placeholder="Search ...">
                        <button type="submit" class="input-group-text bg-success text-light">
                            <i class="fa fa-fw fa-search text-white"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @include('pqrs.modal')
    @show
    
    <span class="ir-arriba icon-arrow-up2"></span>

    @section('contenido')
    @show

    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>    

    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Hanka</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Calle 72p # 26-103
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="">305 222 42 49</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="#">hanka@gmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Categorias</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Calzado</a></li>
                        <li><a class="text-decoration-none" href="#">Accesorios</a></li>
                        <li><a class="text-decoration-none" href="#">Electrodomesticos</a></li>
                        <li><a class="text-decoration-none" href="#">Ropa</a></li>
                        <li><a class="text-decoration-none" href="#">Hogar</a></li>
                        <li><a class="text-decoration-none" href="#">Jugueteria</a></li>
                        <li><a class="text-decoration-none" href="#">Deportivo</a></li>
                    </ul>
                </div>
            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href=""><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href=""><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href=""><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href=""><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light text-light" id="subscribeEmail" placeholder="Email address">
                        <div class="input-group-text btn-success text-light">Subscribe</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2021 Hanka 
                            | Diseñado por <a rel="sponsored" href="#" target="_blank">Adsi 185</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    @routes
    <!-- Start Script -->
    {{-- <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script> --}}
    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#5d78ff",
                    "dark": "#282a3c",
                    "light": "#ffffff",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": [
                        "#c5cbe3",
                        "#a1a8c3",
                        "#3d4465",
                        "#3e4466"
                    ],
                    "shape": [
                        "#f0f3ff",
                        "#d9dffa",
                        "#afb4d4",
                        "#646c9a"
                    ]
                }
            }
        };
    </script>
    <script src="{{ mix('/js/app.js') }}" ></script>
    <script src="{{ asset('/js/plugins.js') }}" ></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    
    <script src="{{ mix('/js/tienda/principal.js') }}" ></script>
    <script src="{{ mix('/js/tienda/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ mix('js/pqrs/principal.js') }}"></script>

    @section('scripts')
    @show
    <!-- End Script -->
</body>

</html>