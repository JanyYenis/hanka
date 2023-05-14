@extends("dashboard.layouts.index")
@section('subheaderTitulo', 'Cargos')
@section('subheaderContent')
    <button type="button" class="btn btn-success" id="btnCargosCrear" href="#" data-bs-toggle="modal" data-bs-target="#modalCrearCargo">
        Agregar Cargos
    </button>
@endsection

@section('contenido')
<div class="card-header border-0 pt-5">
    <h1 class="mt-4"><i class="fas fa-users"></i>Listado Cargos.</h1>
</div>
<div class="card-body pt-2 pb-0 mt-n3">
    <main>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="tablaCargos">
                    <thead>
                        <tr>
                            <th class="text-center all">#</th>
                            <th class="text-center all">Nombre</th>
                            <th class="text-center all">Estado</th>
                            <th class="text-center all">Fecha Creacion</th>
                            <th class="text-center all">Fecha Modificacion</th>
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
    <script src="{{ asset('js/empleados/principal.js') }}"></script>
@endsection

@section('modal')
    @component('dashboard.empleados.cargos.modals')
    @endcomponent

    @component('dashboard.empleados.cargos.crear')
    @endcomponent
@endsection