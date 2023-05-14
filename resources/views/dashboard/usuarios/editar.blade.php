@php
    $fechaNacimiento =  $usuario?->fecha_nacimiento?->format('Y-m-d') ?? '';
@endphp
<input type="hidden" name="id" value="{{$usuario->id}}">
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Nombres</label>
    <div class="col-lg-4">
        <div class="input-group flex-nowrap">
            <input type="text" name="nombre" placeholder="Nombre usuario" class="form-control" value="{{$usuario?->nombre}}" required>
        </div>
    </div>
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Apellidos</label>
    <div class="col-lg-3">
        <div class="input-group flex-nowrap">
            <input type="text" name="apellido" placeholder="Nombre usuario" class="form-control" value="{{$usuario?->apellido}}" required>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Tipo Identificacion</label>
    <div class="col-lg-4">
        <div class="input-group flex-nowrap">
            <select name="tipo_documento" class="form-control kt-selectpiker" required>
                @foreach ($tiposDocumentos as $tipo)
                    <option {{$tipo?->codigo == $usuario?->tipo_documento ? 'selected' : ''}} value="{{$tipo?->codigo}}">{{$tipo?->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Identificacion</label>
    <div class="col-lg-3">
        <div class="input-group flex-nowrap">
            <input type="text" name="documento" placeholder="Nombre identificacion" class="form-control" value="{{$usuario?->documento}}" required>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Genero</label>
    <div class="col-lg-4">
        <div class="input-group flex-nowrap">
            <select name="genero" class="form-control kt-selectpiker" required>
                @foreach ($tiposGeneros as $tipo)
                    <option {{$tipo?->codigo == $usuario?->genero ? 'selected' : ''}} value="{{$tipo?->codigo}}">{{$tipo?->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Fecha nacimiento</label>
    <div class="col-lg-3">
        <div class="input-group flex-nowrap">
            <input id="fecha" type="text" name="fecha_nacimiento" placeholder="Fecha de nacimiento" class="form-control fecha" value="{{$fechaNacimiento}}" required>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right">Tel</label>
    <div class="col-lg-4">
        <div class="input-group flex-nowrap">
            <input type="tel" name="telefono" placeholder="Telefono" id="tel" class="form-control tel" value="{{$usuario?->telefono ?? ''}}">
        </div>
    </div>
    <label class=" col-lg-2 col-form-label text-sm-right requerido">E-mail</label>
    <div class="col-lg-3">
        <div class="input-group flex-nowrap">
            <input type="email" name="email" placeholder="E-mail" class="form-control" value="{{$usuario?->email ?? ''}}">
        </div>
    </div>
</div>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Direccion</label>
    <div class="col-lg-9">
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
    <div class="col-lg-3">
        <div class="input-group flex-nowrap">
            <select class="form-control selectCiudad" id="idCiudad" title="Seleccione las ciudad" name="id_ciudad" data-ciudad="{{$usuario?->ciudad?->id}}">
                @if ($usuario?->ciudad)
                    <option selected value="{{$usuario?->ciudad?->id}}">{{$usuario?->ciudad?->nombre}}</option>
                @endif
            </select>
        </div>
    </div>
</div>