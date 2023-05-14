@php
    $categorias = $categorias ?? [];
@endphp
@extends("layouts.index")

@section('contenido')
    <!-- Start Banner Hero -->
    <div class="container py-5 bg-light">
        <div id="kt-carosuel" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($categorias as $index => $categoria)
                    <li data-bs-target="#kt-carosuel" data-bs-slide-to="{{$index}}" class="{{$index == 0 ? 'active':''}}" 
                        style="margin-top: -50px; background-color: #70dad1;"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                <div class="container">
                    @foreach ($categorias as $index => $categoria)
                        <div class="carousel-item {{$index == 0 ? 'active':''}}">
                            <div class="container">
                                <div class="row p-5">
                                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                        <img class="img-fluid" src="{{$categoria?->banner}}" alt="">
                                    </div>
                                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                                        <div class="text-align-left align-self-center">
                                            <h1 class="h1 text-success"><b>{{$categoria?->nombre}}</b></h1>
                                            <p>{!! html_entity_decode($categoria?->descripcion ?? '' , ENT_QUOTES, "UTF-8") !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#kt-carosuel" role="button" data-bs-slide="prev">
                <i class="text-success fas fa-chevron-left icon-4x"></i>
            </a>
            <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#kt-carosuel" role="button" data-bs-slide="next">
                <i class="text-success fas fa-chevron-right icon-4x"></i>
            </a>
        </div>
    </div>
    <!-- End Banner Hero -->

    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categorias</h1>
                <p>
                    Las categorias mas vistas.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="{{ asset('img/category_img_01.jpg') }}" alt="" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Relojes</h5>
                <p class="text-center"><a class="btn btn-success">Ir a la tienda</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="{{ asset('img/category_img_02.jpg') }}" alt="" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Zapatos</h2>
                <p class="text-center"><a class="btn btn-success">Ir a la tienda</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="{{ asset('img/category_img_03.jpg') }}" alt="" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Accesorios</h2>
                <p class="text-center"><a class="btn btn-success">Ir a la tienda</a></p>
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->

    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Productos Destacados</h1>
                    <p>
                        Este mes adquiere nuestros productos a un menor precio mayor calidad.
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach ($destacados as $destacado)
                    @php
                        $calificacion = $destacado?->calificacion ?? 0;
                        $cantidadComentarios = $destacado?->comentarios()->count() ?? 0;
                    @endphp
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <a href="{{ route('home.detalle', ['producto' => $destacado?->id]) }}">
                                <img src="{{$destacado?->imagenPrincipal?->ruta_imagen ?? 'img/productos/por-defecto.png'}}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li>
                                        @for ($i = 1; $i <= $calificacion; $i++)
                                            <i class="text-warning fa fa-star"></i>
                                        @endfor
                                        @if ($calificacion < 5)
                                            @for ($calificacion; $calificacion < 5; $calificacion++)
                                                <i class="text-muted fa fa-star"></i>
                                            @endfor
                                        @endif
                                    </li>
                                    <li class="text-muted text-right">{{"$".number_format($destacado?->precio_venta)}}</li>
                                </ul>
                                <a href="shop-single.html" class="h2 text-decoration-none text-dark">{{$destacado?->nombre_producto}}</a>
                                <p class="card-text">{!! html_entity_decode($destacado?->descripcion ?? '' , ENT_QUOTES, "UTF-8") !!}</p>
                                <p class="text-muted">Comentarios ({{$cantidadComentarios}})</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Featured Product -->
@endsection