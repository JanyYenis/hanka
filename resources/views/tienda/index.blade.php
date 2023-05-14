@php
    $productos = $productos ?? [];
@endphp
@extends("layouts.index")

@section('css')
    <link rel="stylesheet" href="{{ mix('css/tienda/estiloComentario.css') }}">
@endsection

@section('contenido')
<div class="container py-5">
    <div class="col-lg-12">
        <form id="formFiltroProductos">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline shop-top-menu pb-3 pt-1">
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="#">Productos</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 pb-4">
                    <div class="d-flex">
                        <select class="form-control" id="selectFiltrarVerProductos" name="valor">
                            <option value="1" selected>Todos</option>
                            <option value="2">Ofertas</option>
                            <option value="3">Descuento</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <div class="card" id="seccionListadoProductos">
        </div>
    </div>
</div>
@endsection

@section('modal')
    @component('dashboard.comentarios.modals')
    @endcomponent
@endsection

@section('scripts')
    <script src="{{ mix('js/tienda/principal.js') }}"></script>
@endsection