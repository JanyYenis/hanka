<html lang="es">
<head>
    <meta charset="utf-8">
    <title>HANKA</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" href="{{ asset('img/hanka_logo.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/hanka_logo.ico') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
    <link rel="stylesheet" href="{{ mix('css/themes/layout/aside/dark.css') }}">
    <link rel="stylesheet" href="{{ mix('css/themes/layout/brand/dark.css') }}">
    <link rel="stylesheet" href="{{ mix('css/themes/layout/header/base/light.css') }}">
    <link rel="stylesheet" href="{{ mix('css/themes/layout/header/menu/light.css') }}">
    <link rel="stylesheet" href="{{ mix('css/plugins/global/plugins.css') }}">
    <link rel="stylesheet" href="{{ mix('css/plugins/custom/prismjs/prismjs.css') }}">
    <link rel="stylesheet" href="{{ mix('css/plugins/custom/fullcalendar/fullcalendar.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/select-multiple/principal.css') }}"> --}}

    <link href="{{ mix('css/dataTable/dataTables.css') }}" rel="stylesheet" />

</head>

<style>
    .selection .select2-selection.select2-selection--single{
        height: 40px;
        width: 100%;
    }
</style>
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed">
    @component('dashboard.layouts.componentes.header-mobile')
    @endcomponent
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                @component('dashboard.layouts.componentes.header')
                    @slot('buscador', false)
                    @slot('notificacion', false)
                    @slot('lenguaje', false)
                @endcomponent
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    @component('dashboard.layouts.componentes.subheader')
                    @endcomponent
                    <div class="d-flex flex-column-fluid">
                        <div class="container">
                            <div class="row">
                                <div class="col-xxl-8 order-1 order-xxl-1">
                                    <div class="card card-custom card-stretch gutter-b">
                                        @section('contenido')
                                        @show
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
    
    {{-- <script src="{{ mix('js/select-multiple/principal.js') }}"></script> --}}
    
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    
    @section('scripts')
    @show
    <!-- End Script -->

    <!-- Modal -->
    @section('modal')
    @show
    
</body>
</html>