@php
    $telefonos = $usuario?->telefonos ?? [];
@endphp
<div class="container py-5">
    <div class="row">
        <div class="col-12 col-lg-5 col-md-5">
            <div class="kt-section__title kt-section__title-md">Números Telefónicos: 
            </div>
        </div>
        <div class="col-12 col-lg-7 col-md-7 text-md-right">
            <button class="btn btn-success" type="button" id="btnAddTelefono" data-toggle="modal" data-target="#modalCrearTelefono">
                <i class="la la-plus" aria-hidden="true"></i>
                <span class="ml-1">Agregar</span>
            </button>
        </div>
    </div> 
    <div id="seccionTelefono">
        @component('tienda.usuarios.pasos.telefono.ver-telefonos')
            @slot('telefonos', $telefonos)
        @endcomponent
    </div>
    <div class="separator separator-dashed my-10"></div>
    <form id="formEditarCorreo">
        <input type="hidden" name="id" value="{{$usuario?->id}}">
        <div class="row">
            <div class="col-12 col-lg-5 col-md-5">
                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="flaticon-email"></i>
                        </span>
                    </div>
                    <input type="email" name="email" class="form-control email" value="{{$usuario?->email}}" required>
                </div>
                <span class="form-text text-muted">Ingrese su correo</span>
            </div>
            <div class="col-12 col-lg-7 col-md-7 text-md-right">
                <button class="btn btn-success" type="submit"><span class="ml-1">Guardar</span></button>
            </div>
        </div>
    </form>
</div>