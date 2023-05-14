@extends("dashboard.layouts.index")
@section('subheaderTitulo', 'Subcategorias')
@section('subheaderContent')
    <button type="button" class="btn btn-success" id="btnSubcategoriaCrear" href="#" data-bs-toggle="modal" data-bs-target="#modalCrearSubcategorias">
        Agregar Subcategoria
    </button>
@endsection

@section('contenido')
<div class="card-header border-0 pt-5">
    <h1 class="mt-4">Listado Subcategoria.</h1>
</div>
<div class="card-body pt-2 pb-0 mt-n3">
    <main>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="tablaSubcategorias">
                    <thead>
                        <tr>
                            <th class="text-center all">#</th>
                            <th class="text-center all">Nombre</th>
                            <th class="text-center none">Descripcion</th>
                            <th class="text-center none">Fecha creacion</th>
                            <th class="text-center none">Fecha actualización</th>
                            <th class="text-center all">Categoria</th>
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
    <script src="{{ asset('js/productos/subcategorias/principal.js') }}"></script>
@endsection

@section('modal')
    @component('dashboard.productos.subcategorias.modals')
    @endcomponent

    @component('dashboard.productos.subcategorias.crear')
    @endcomponent
@endsection