@extends("dashboard.layouts.index")

@section('contenido')
<div class="card-header border-0 pt-5">
    <h1 class="mt-4">Listado de PQRS.</h1>
</div>
<div class="card-body pt-2 pb-0 mt-n3">
    {{-- <a href="{{ route('pqrs.tabla')}}">Tabla</a> --}}
    <main>
        <table id="tablaPqrs" class="table table-striped table-bordered dt-responsive nowrap">
            <thead>
                <tr>
                    <th class="text-center all">#</th>
                    <th class="text-center all">Nombre</th>
                    <th class="text-center all">Documento</th>
                    <th class="text-center all">Tipo Documento</th>
                    <th class="text-center all">Tipo Solicitud</th>
                    <th class="text-center all">Email</th>
                    <th class="text-center all">Estado</th>
                    <th class="text-center all">Acciones</th>
                    <th class="text-center none">Fecha Radicada</th>
                    <th class="text-center none">Fecha Respuesta</th>
                    <th class="text-center none">Usuario</th>
                    <th class="text-center none">Empleado</th>
                    <th class="text-center none">Notificacion</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </main>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/pqrs/principal.js') }}"></script>
@endsection

@section('modal')
    @component('pqrs.modal')
    @endcomponent
@endsection