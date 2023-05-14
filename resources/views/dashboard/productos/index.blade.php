@extends("dashboard.layouts.index")
@section('subheaderTitulo', 'Productos')
@section('subheaderContent')
    <button type="button" class="btn btn-success" id="btnProductosCrear" href="#" data-bs-toggle="modal" data-bs-target="#modalCrearProductos">
        Agregar Productos
    </button>
@endsection

@section('contenido')
<div class="card-header border-0 pt-5">
    <h1 class="mt-4">Listado Productos.</h1>
</div>
<div class="card-body pt-2 pb-0 mt-n3">
    <main>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="tablaProductos">
                    <thead>
                        <tr>
                            <th class="text-center all">#</th>
                            <th class="text-center all">Imagen</th>
                            <th class="text-center all">Nombre</th>
                            <th class="text-center all">Precio</th>
                            <th class="text-center all">Cantidad</th>
                            <th class="text-center none">Descripción</th>
                            <th class="text-center none">Descuento</th>
                            <th class="text-center none">IVA</th>
                            <th class="text-center none">Garantia</th>
                            <th class="text-center all">Subcategoria</th>
                            <th class="text-center all">Marca</th>
                            <th class="text-center all">Estado</th>
                            <th class="text-center all">Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </main>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/productos/principal.js') }}"></script>
@endsection

@section('modal')
    @component('dashboard.productos.modals')
    @endcomponent

    @component('dashboard.productos.crear')
    @endcomponent
@endsection