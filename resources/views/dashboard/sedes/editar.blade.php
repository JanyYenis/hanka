<input type="hidden" name="id" value="{{$sede->id}}">
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Nombre</label>
    <div class="col-lg-4">
        <div class="input-group flex-nowrap">
            <input type="text" name="nombre" placeholder="Nombre sede" class="form-control" value="{{$sede?->nombre ?? ''}}" required>
        </div>
    </div>
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Direccion</label>
    <div class="col-lg-3">
        <div class="input-group flex-nowrap">
            <input type="text" name="direccion" placeholder="Direccion" class="form-control" value="{{$sede?->direccion ?? ''}}" required>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">E-mail</label>
    <div class="col-lg-9">
        <div class="input-group flex-nowrap">
            <input type="text" name="email" placeholder="_@_" class="form-control email" value="{{$sede?->email ?? ''}}" required>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right ">Pais</label>
    <div class="col-lg-4">
        <div class="input-group flex-nowrap">
            <select class="kt-select2 select2 form-control select-menu" id="selectPais" data-placeholder="Seleccione el pais" name="pais">
                @if ($sede?->ciudad)
                    <option selected value="{{$sede?->ciudad?->pais?->id}}">{{$sede?->ciudad?->pais->nombre}}</option>
                @endif
            </select>
        </div>
    </div>
    <label class=" col-lg-2 col-form-label text-sm-right ">Ciudad</label>
    <div class="col-lg-3">
        <div class="input-group flex-nowrap">
            <select class="form-control selectCiudad" id="idCiudad" title="Seleccione las ciudad" name="id_ciudad" data-ciudad="{{$sede?->ciudad?->id}}">
                @if ($sede?->ciudad)
                    <option selected value="{{$sede?->ciudad?->id}}">{{$sede?->ciudad?->nombre}}</option>
                @endif
            </select>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="col-lg-2 col-form-label text-right">Telefono</label>
    <div class="col-lg-5">
        <div class="mb-2">
            <div class="input-group" id="seccionTel">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-phone-alt"></i>
                    </span>
                </div>
                <input type="text" class="form-control tel" name="numero" value="{{$telefono?->numero ?? ''}}"/>
            </div>
        </div>
    </div>
    <label class="col-1 col-form-label text-right">Principal</label>
    <div class="col-3">
    <span class="switch switch-icon">
        <label>
            <input type="checkbox" name="principal" class="principal" {{$sede?->principal ? 'checked' : ''}} value="1"/>
            <span></span>
        </label>
    </span>
    </div>
</div>