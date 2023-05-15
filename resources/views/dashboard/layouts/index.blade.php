<html lang="es">
<head>
    <meta charset="utf-8">
    <title>HANKA</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" href="{{ asset('img/hanka_logo.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/hanka_logo.ico') }}">

    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
    <link rel="stylesheet" href="{{ mix('css/themes/layout/aside/dark.css') }}">
    <link rel="stylesheet" href="{{ mix('css/themes/layout/brand/dark.css') }}">
    <link rel="stylesheet" href="{{ mix('css/themes/layout/header/base/light.css') }}">
    <link rel="stylesheet" href="{{ mix('css/themes/layout/header/menu/light.css') }}">
    <link rel="stylesheet" href="{{ mix('css/plugins/global/plugins.css') }}">
    <link rel="stylesheet" href="{{ mix('css/plugins/custom/prismjs/prismjs.css') }}">
    <link rel="stylesheet" href="{{ mix('css/plugins/custom/fullcalendar/fullcalendar.css') }}">
    <link rel="stylesheet" href="{{ mix('css/themes/wizard-1.css') }}">
</head>

<style>
    .selection .select2-selection.select2-selection--single{
        height: 40px;
        width: 100%;
    }
    table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child:before{
        top: 50%;
        left: 4px;
        height: 20px;
        width: 20px;
        display: block;
        position: absolute;
        color: white;
        border: 2px solid white;
        border-radius: 100px;
        box-shadow: 0 0 3px #444;
        box-sizing: border-box;
        text-align: center;
        text-indent: 5 !important;
        font-family: 'Courier New', Courier, monospace;
        line-height: 17px;
        content: '+';
        background-color: #337ab7;
    }
    .dataTables_wrapper table.dataTable.dtr-inline.collapsed > tbody > tr.parent > td:first-child:before {
        color: #3699FF;
        background-color: transparent;
        font-family: Ki;
        font-style: normal;
        font-weight: normal;
        font-variant: normal;
        line-height: 1.5;
        text-decoration: inherit;
        text-rendering: optimizeLegibility;
        text-transform: none;
        -moz-osx-font-smoothing: grayscale;
        -webkit-font-smoothing: antialiased;
        content: "";
    }
</style>
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading @yield('subHeaderClass','')  @yield('minimizarAside','')">
    @component('dashboard.layouts.componentes.header-mobile')
    @endcomponent
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">
            @component('dashboard.layouts.componentes.aside')
            @endcomponent
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                @component('dashboard.layouts.componentes.header')
                @endcomponent
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    @component('dashboard.layouts.componentes.subheader')
                    @endcomponent
                    <div class="d-flex flex-column-fluid">
                        <div class="container">
                            <div class="row">
                                <div class="col-xxl-8 order-1 order-xxl-1" id="contenidoPrincipal">
                                    <div class="card card-custom card-stretch gutter-b">
                                        @section('contenido')
                                        @show
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @component('dashboard.layouts.componentes.footer')
                @endcomponent
            </div>
        </div>
    </div>

    @component('dashboard.layouts.componentes.mini-menu')
    @endcomponent

    <div id="kt_scrolltop" class="scrolltop">
        <i class="text-dark-25 fa fa-arrow-up"></i>
    </div> 

    @routes
    <!-- Start Script -->
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
    <script src="{{ asset('js/datatables.bundle.js') }}"></script>
    
    @section('scripts')
    @show
    <!-- End Script -->

    <!-- Modal -->
    @section('modal')
    @show
    
</body>
</html>