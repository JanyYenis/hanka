@extends("dashboard.layouts.index")
@section('subheaderTitulo', 'Empleados')
@section('subheaderContent')
    <button type="button" class="btn btn-success" id="btnEmpleadosCrear" href="#" data-bs-toggle="modal" data-bs-target="#modalCrearEmpleado">
        Agregar Empleados
    </button>
@endsection

@section('contenido')
<div class="card-header border-0 pt-5">
    <h1 class="mt-4">Listado Empleados.</h1>
</div>
<div class="card-body pt-2 pb-0 mt-n3">
    <main>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="tablaEmpleados">
                    <thead>
                        <tr>
                            <th class="text-center all">#</th>
                            <th class="text-center all">Nombre</th>
                            <th class="text-center all">Tipo Documento</th>
                            <th class="text-center all">Documento</th>
                            <th class="text-center all">Cargo</th>
                            <th class="text-center all">Estado</th>
                            <th class="text-center none">Telefono</th>
                            <th class="text-center none">Email</th>
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
    @component('dashboard.empleados.modals')
    @endcomponent

    @component('dashboard.empleados.crear')
    @endcomponent
@endsection