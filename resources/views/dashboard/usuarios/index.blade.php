@extends("dashboard.layouts.index")
@section('subheaderTitulo', 'Usuarios')
@section('subheaderContent')
    <button type="button" class="btn btn-success" id="btnUsuariosCrear" href="#" data-bs-toggle="modal" data-bs-target="#modalCrearUsuario">
        Agregar Usuarios
    </button>
@endsection

@section('contenido')
<div class="card-header border-0 pt-5">
    <h1 class="mt-4">Listado Usuarios.</h1>
</div>
<div class="card-body pt-2 pb-0 mt-n3">
    <main>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="tablaUsuarios">
                    <thead>
                        <tr>
                            <th class="text-center all">#</th>
                            <th class="text-center all">Nombre</th>
                            <th class="text-center all">Documento</th>
                            <th class="text-center all">Tipo Documento</th>
                            <th class="text-center all">Puntos</th>
                            <th class="text-center none">Genero</th>
                            <th class="text-center none">Fecha de nacimiento</th>
                            <th class="text-center none">Telefono</th>
                            <th class="text-center none">Direccion</th>
                            <th class="text-center none">Email</th>
                            <th class="text-center none">Ciudad</th>
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
    <script src="{{ asset('js/usuarios/principal.js') }}"></script>
@endsection

@section('modal')
    @component('dashboard.usuarios.modals')
    @endcomponent

    @component('dashboard.usuarios.crear')
        @slot('tiposGeneros', $tiposGeneros ?? [])
        @slot('tiposDocumentos', $tiposDocumentos ?? [])
    @endcomponent
@endsection