@extends("layouts.index")

@section('contenido')
<div class="container py-5">
    <div class="d-flex flex-row">
        <!--begin::Layout-->
        <div class="flex-row-fluid ml-lg-8">
            <div class="card card-custom gutter-b">
                <div class="card-body d-flex rounded bg-danger p-12 flex-column flex-md-row flex-lg-column flex-xxl-row">
                    <div class="bgi-no-repeat bgi-position-center bgi-size-cover h-300px h-md-auto h-lg-300px h-xxl-auto mw-100 w-550px" style="background-image: url({{ asset($producto?->imagenPrincipal?->ruta_imagen ?? 'img/productos/por-defecto.png') }})"></div>
                    <div class="card card-custom w-auto w-md-300px w-lg-auto w-xxl-300px">
                        <div class="card-body px-12 py-10">
                            <h3 class="font-weight-bolder font-size-h2 mb-1">
                                <a href="#" class="text-dark-75">{{$producto?->nombre_producto ?? ''}}</a>
                            </h3>
                            <div class="text-primary font-size-h4 mb-9">{{'$'.number_format($producto?->precio_venta)}}</div>
                            <div class="font-size-sm mb-8" style="">{!! html_entity_decode($producto?->descripcion ?? '' , ENT_QUOTES, "UTF-8") !!}</div>
                            <div class="d-flex mb-3">
                                <span class="text-dark-50 flex-root font-weight-bold">Marca</span>
                                <span class="text-dark flex-root font-weight-bold">{{$producto?->marca?->nombre ?? ''}}</span>
                            </div>
                            <div class="d-flex mb-3">
                                <span class="text-dark-50 flex-root font-weight-bold">Categoria</span>
                                <span class="text-dark flex-root font-weight-bold">{{$producto?->subcategoria?->categoria?->nombre ?? ''}}</span>
                            </div>
                            <div class="d-flex mb-3">
                                <span class="text-dark-50 flex-root font-weight-bold">Subcategoria</span>
                                <span class="text-dark flex-root font-weight-bold">{{$producto?->subcategoria?->nombre ?? ''}}</span>
                            </div>
                            <div class="d-flex mb-3">
                                <span class="text-dark-50 flex-root font-weight-bold">Colores</span>
                                <div class="radio-inline">
                                    <label class="radio radio-accent radio-danger mr-0">
                                        <input type="radio" name="color-selector" checked="checked">
                                        <span></span>
                                    </label>
                                    <label class="radio radio-accent radio-primary mr-0">
                                        <input type="radio" name="color-selector">
                                        <span></span>
                                    </label>
                                    <label class="radio radio-accent radio-success mr-0">
                                        <input type="radio" name="color-selector">
                                        <span></span>
                                    </label>
                                    <label class="radio radio-accent radio-info mr-0">
                                        <input type="radio" name="color-selector">
                                        <span></span>
                                    </label>
                                    <label class="radio radio-accent radio-dark mr-0">
                                        <input type="radio" name="color-selector">
                                        <span></span>
                                    </label>
                                    <label class="radio radio-accent radio-secondary mr-0">
                                        <input type="radio" name="color-selector">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <span class="text-dark-50 flex-root font-weight-bold">Cantidad de unidades</span>
                                <span class="text-dark flex-root font-weight-bold">{{number_format($producto?->cantidad)}}</span>
                            </div>
                            <div class="d-flex mb-3">
                                <div class="col-lg-3">
                                    <input type="number" class="form-control" value="1">&nbsp;&nbsp;
                                </div>
                                <div class="col-lg-3">
                                    <button type="button" class="btnAgregarCarrito btn btn-primary" data-producto="{{$producto?->id}}"><i class="fas fa-cart-plus"></i> Agregar al carrito</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Layout-->
    </div>
</div>
@endsection

@section('modal')
    {{-- @component('dashboard.comentarios.modals')
    @endcomponent --}}
@endsection

@section('scripts')
    {{-- <script src="{{ mix('js/tienda/principal.js') }}"></script> --}}
@endsection