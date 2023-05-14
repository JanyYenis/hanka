@extends("dashboard.layouts.index")
@section('subheaderTitulo', 'Terminos y Condiciones')
@section('subheaderContent')
    <button type="button" class="btn btn-success" id="btnTerminoCrear" href="#" data-bs-toggle="modal" data-bs-target="#modalCrearTerminos">
        Agregar Terminos
    </button>&nbsp;
    <button type="button" class="btn btn-info" id="btnVerTerminos">
        <i class="fas fa-eye"></i>
        Ver Terminos
    </button>
@endsection

@section('contenido')
<div class="card-header border-0 pt-5">
    <h1 class="mt-4">Listado Terminos y Condiciones.</h1>
</div>
<div class="card-body pt-2 pb-0 mt-n3">
    <main>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="tablaTerminos">
                    <thead>
                        <tr>
                            <th class="text-center all">#</th>
                            <th class="text-center all">Titulo</th>
                            <th class="text-center all">Descripcion</th>
                            <th class="text-center all">Mostrar</th>
                            <th class="text-center none">Fecha creacion</th>
                            <th class="text-center none">Fecha actualización</th>
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
    <script src="{{ asset('js/terminos/principal.js') }}"></script>
@endsection

@section('modal')
    @component('dashboard.terminos.modals')
    @endcomponent

    @component('dashboard.terminos.crear')
    @endcomponent
@endsection