@php
    $usuario = $usuario ?? [];
    $tiposGeneros = $tiposGeneros ?? [];
    $tiposDocumentos = $tiposDocumentos ?? [];
@endphp
@extends("layouts.index")

@section('contenido')
<div class="container py-5">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-6">
                <ul class="list-inline shop-top-menu pb-3 pt-1">
                    <li class="list-inline-item">
                        <a class="h3 text-dark text-decoration-none mr-3" href="#">Mi Perfil</a>
                    </li>
                </ul>
            </div>
        </div><br>
        @component('tienda.usuarios.perfil')
            @slot('usuario', $usuario)
            @slot('tiposGeneros', $tiposGeneros)
            @slot('tiposDocumentos', $tiposDocumentos)
        @endcomponent
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ mix('js/usuarios/perfil.js') }}"></script>
@endsection

@section('modal')
    @component('tienda.usuarios.pasos.modals')
        @slot('tiposTelefonos', $tiposTelefonos)
    @endcomponent
@endsection