@php
    $fechaNacimiento =  $usuario?->fecha_nacimiento?->format('Y-m-d') ?? '';
@endphp
<form id="formEditarPerfil">
    <div id="errores">
        @component('sistema/div-errores')
        @endcomponent
    </div>
    <input type="hidden" name="id" value="{{$usuario->id}}">
    <div class="form-group row">
        <label class=" col-lg-2 col-form-label text-sm-right requerido">Nombres</label>
        <div class="col-lg-4">
            <div class="input-group flex-nowrap">
                <input type="text" name="nombre" placeholder="Nombre usuario" class="form-control" value="{{$usuario?->nombre}}" required>
            </div>
        </div>
        <label class=" col-lg-2 col-form-label text-sm-right requerido">Apellidos</label>
        <div class="col-lg-4">
            <div class="input-group flex-nowrap">
                <input type="text" name="apellido" placeholder="Nombre usuario" class="form-control" value="{{$usuario?->apellido}}" required>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class=" col-lg-2 col-form-label text-sm-right requerido">Tipo Identificacion</label>
        <div class="col-lg-4">
            <div class="input-group flex-nowrap">
                <select name="tipo_documento" class="form-control kt-selectpiker" aria-readonly="true" required>
                    @foreach ($tiposDocumentos as $tipo)
                        <option {{$tipo?->codigo == $usuario?->tipo_documento ? 'selected' : ''}} value="{{$tipo?->codigo}}">{{$tipo?->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <label class=" col-lg-2 col-form-label text-sm-right requerido">Identificacion</label>
        <div class="col-lg-4">
            <div class="input-group flex-nowrap">
                <input type="text" name="documento" placeholder="Nombre identificacion" {{$usuario?->documento ? 'readonly' : ''}} class="form-control" value="{{$usuario?->documento}}" required>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class=" col-lg-2 col-form-label text-sm-right requerido">Genero</label>
        <div class="col-lg-4">
            <div class="input-group flex-nowrap">
                <select name="genero" class="form-control kt-selectpiker" aria-readonly="true" required>
                    @foreach ($tiposGeneros as $tipo)
                        <option {{$tipo?->codigo == $usuario?->genero ? 'selected' : ''}} value="{{$tipo?->codigo}}">{{$tipo?->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <label class=" col-lg-2 col-form-label text-sm-right requerido">Fecha nacimiento</label>
        <div class="col-lg-4">
            <div class="input-group flex-nowrap">
                <input id="fecha" type="text" name="fecha_nacimiento" {{$usuario?->fecha_nacimiento ? 'disabled' : ''}} placeholder="Fecha de nacimiento" class="form-control fecha" value="{{$fechaNacimiento}}" required>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class=" col-lg-2 col-form-label text-sm-right requerido">Direccion</label>
        <div class="col-lg-10">
            <div class="input-group flex-nowrap">
                <input type="text" name="direccion" placeholder="Direccion" class="form-control" value="{{$usuario?->direccion ?? ''}}" required>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class=" col-lg-2 col-form-label text-sm-right requerido">Pais</label>
        <div class="col-lg-4">
            <div class="input-group flex-nowrap">
                <select class="form-control selectPais" data-placeholder="Seleccione el pais" name="pais">
                    @if ($usuario?->ciudad)
                        <option selected value="{{$usuario?->ciudad?->pais?->id}}">{{$usuario?->ciudad?->pais->nombre}}</option>
                    @endif
                </select>
            </div>
        </div>
        <label class=" col-lg-2 col-form-label text-sm-right requerido">Ciudad</label>
        <div class="col-lg-4">
            <div class="input-group flex-nowrap">
                <select class="form-control selectCiudad" id="idCiudad" title="Seleccione las ciudad" name="id_ciudad" data-ciudad="{{$usuario?->ciudad?->id}}">
                </select>
            </div>
        </div>
    </div>
    <div class="separator separator-dashed my-10"></div>
    <center>
        <div>
            <button type="submit" class="btn btn-success btn-shadow font-weight-bold mr-2 btn-lg">Guardar</button>
        </div>
    </center>
</form>