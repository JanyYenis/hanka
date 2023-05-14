@extends("dashboard.layouts.index")
@section('subheaderTitulo', 'Pedidos')
@section('subheaderContent')
    <button type="button" class="btn btn-success" id="btnPedidosCrear" href="#" data-bs-toggle="modal" data-bs-target="#modalCrearPedidos">
        Agregar Pedidos
    </button>
@endsection

@section('contenido')
<div class="card-header border-0 pt-5">
    <h1 class="mt-4">Listado Pedidos.</h1>
</div>
<div class="card-body pt-2 pb-0 mt-n3">
    <main>
        @component('dashboard.pedidos.listado')
        @endcomponent
    </main>
</div>
@endsection

@section('scripts')
    <script>window.misPedidos = 0;</script>
    <script src="{{ asset('js/pedidos/principal.js') }}"></script>
@endsection

@section('modal')
    {{-- @component('dashboard.pedidos.modals')
    @endcomponent --}}

    {{-- @component('dashboard.pedidos.crear')
    @endcomponent --}}
@endsection