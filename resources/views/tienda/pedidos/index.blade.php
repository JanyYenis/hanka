@extends("layouts.index")

@section('contenido')
<div class="container py-5">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-6">
                <ul class="list-inline shop-top-menu pb-3 pt-1">
                    <li class="list-inline-item">
                        <a class="h3 text-dark text-decoration-none mr-3" href="#">Mis pedidos</a>
                    </li>
                </ul>
            </div>
        </div>
        @component('dashboard.pedidos.listado')
        @endcomponent
    </div>
</div>
@endsection

@section('scripts')
    <script>window.misPedidos = 1;</script>
    <script src="{{ mix('js/pedidos/principal.js') }}"></script>
@endsection