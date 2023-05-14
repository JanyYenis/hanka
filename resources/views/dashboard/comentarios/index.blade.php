@extends("dashboard.layouts.index")
@section('subheaderTitulo', 'Comentarios')

@section('contenido')
<div class="card-header border-0 pt-5">
    <h1 class="mt-4">Listado Comentarios</h1>
</div>
<div class="card-body pt-2 pb-0 mt-n3">
    <main>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="tablaComentarios">
                    <thead>
                        <tr>
                            <th class="text-center all">#</th>
                            <th class="text-center all">Producto</th>
                            <th class="text-center all">Usuario</th>
                            <th class="text-center all">Estrellas</th>
                            <th class="text-center all">Fecha</th>
                            <th class="text-center all">Estado</th>
                            <th class="text-center none">Comentario</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </main>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/comentarios/principal.js') }}"></script>
@endsection