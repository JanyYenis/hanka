@php
    $productos = $productos ?? [];
@endphp
<div class="row">
    @if (count($productos) == 0)
    <div class="container">
        <h5 class="text-dark text-center p-5">
            No hay productos disponibles.<br/>Puede que no se hayan encontrado resultados que coincidan con los filtros aplicados.
        </h5>
    </div>
    @else
        @foreach ($productos as $producto)
            @php
                $calificacion = $producto?->calificacion ?? 0;
            @endphp
            <div class="col-md-4">
                <div class="card card-custom overlay">
                    <div class="overlay-wrapper">
                        <img src="{{asset($producto?->imagenPrincipal?->ruta_imagen ?? 'img/productos/por-defecto.png')}}" alt="" class="w-100 rounded"/>
                    </div>
                        <div class="overlay-layer">
                            <a href="#" class="btnAgregarFavorito btn font-weight-bold btn-primary btn-shadow" data-producto="{{$producto?->id}}"><i class="far fa-heart"></i></a>
                            <a href="#" class="btnAgregarCarrito btn font-weight-bold btn-light-primary btn-shadow ml-2" data-producto="{{$producto?->id}}"><i class="fas fa-cart-plus"></i></a>
                            <a href="#" class="btnAgregarComentario btn font-weight-bold btn-primary btn-shadow ml-2" data-producto="{{$producto?->id}}"><i class="far fa-comments"></i></a>
                        </div>
                    <div class="card-body">
                        <a href="{{ route('home.detalle', ['producto' => $producto?->id]) }}" class="h3 text-decoration-none">{{$producto?->nombre_producto}}</a>
                        <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                            <li>{!! html_entity_decode($producto?->descripcion ?? '' , ENT_QUOTES, "UTF-8") !!}</li>
                        </ul>
                        <ul class="list-unstyled d-flex justify-content-center mb-1">
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
                        </ul>
                        <p class="text-center mb-0">{{number_format($producto?->precio_venta)}}</p>
                    </div>
                </div>
            </div>  
        @endforeach
        @component("tienda.paginacion")
            @slot("catidadDatos", $productos)
            @slot("ultimaPagina", $ultimaPagina)
            @slot("paginaActual", $paginaActual)
        @endcomponent
    @endif
</div>