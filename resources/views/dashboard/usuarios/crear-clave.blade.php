@extends("dashboard.layouts.sin-aside")

@section('contenido')
<div class="card-header border-0 pt-5">
    <h3 class="kt-portlet__head-title">
        <i class="fas fa-lock"></i>
        Creacion de contraseña.
    </h3>
</div><br>
<div class="card-body pt-2 pb-0 mt-n3">
    <main>
        <div id="errores">
            @component('sistema/div-errores')
            @endcomponent
        </div>
        <form id="formCrearClaveUsuario">
            <h3>{{$usuario?->nombre}}</h3>
            <input type="hidden" name="id" value="{{$usuario?->id}}">
            <div class="form-group row">
                <label class=" col-lg-3 col-form-label text-sm-right">Contraseña:</label>
                <div class="col-lg-8">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                        <input type="password" name="password" placeholder="Ingrese su contraseña" class="form-control clave"  min="8" required>
                        <button class="btn btn-primary" type="button" id="verClave"><i class="far fa-eye"></i></button>
                        <span id="clave-error" class="help-block help-block-error"></span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class=" col-lg-3 col-form-label text-sm-right ">Confirmar Contraseña:</label>
                <div class="col-lg-8">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                        <input type="password" name="password2" placeholder="Ingrese nuevamente su contraseña" class="form-control clave2" required>
                        <button class="btn btn-primary" type="button" id="verClave2"><i class="far fa-eye"></i></button>
                        <span id="clave-error" class="help-block help-block-error"></span>
                    </div>
                </div>
            </div>
            <center>
                <button type="submit" class="btn btn-success">Guardar</button>
            </center>
        </form>
    </main>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/usuarios/principal.js') }}"></script>
@endsection