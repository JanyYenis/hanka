@php
    $carritos = $carritos ?? [];
@endphp
@extends("layouts.index")

@section('contenido')
<div class="container py-5">
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder font-size-h3 text-dark">Mi Carrito</span>
            </h3>
            <div class="card-toolbar" id="btnRegistarPedido">
                <div class="dropdown dropdown-inline">
                    <a href="#" class="btn btn-primary font-weight-bolder font-size-sm">Realizar pedido</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="seccionTabla">
                @component('tienda.carrito.listado')
                    @slot('carritos', $carritos ?? [])
                @endcomponent
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ mix('js/tienda/carrito.js') }}"></script>
@endsection