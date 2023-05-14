<input type="hidden" name="id" value="{{$telefono?->id}}">
<div class="form-group row">
    <label class="col-lg-2 col-form-label text-sm-right requerido">Tipo Teléfono</label>
    <div class="col-lg-4">
        <select title="Seleccione el tipo" class="form-control kt-selectpiker tiposTelefonos" name="tipo" required>
            @foreach ($tiposTelefonos as $tipo)
                <option value="{{$tipo?->codigo}}" {{$telefono?->tipo == $tipo?->codigo ? 'selected' : ''}}>{{$tipo?->nombre}}</option>
            @endforeach
        </select>
        <span class="form-text text-muted">Móvil, Fijo</span>
    </div>
    <label class="col-lg-2 col-form-label text-sm-right requerido">Teléfono</label>
    <div class="col-lg-4">
        <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-phone-alt"></i>
                </span>
            </div>
            <input type="tel" name="numero" id="tel" class="form-control tel" value="{{$telefono?->numero}}" required>
        </div>
        <span class="form-text text-muted">Ingrese su telefono</span>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6 col-xl-6">
        <span class="switch switch-sm">
            <label>
                <input type="checkbox" id="tieneWhatsapp" name="whatsapp" {{$telefono?->whatsapp ? 'checked' : ''}} value="1">
                <span></span>
                &nbsp;<i class="text-success flaticon-whatsapp"></i>&nbsp;WhatsApp
            </label>
        </span>
    </div>
    <div class="col-lg-6 col-xl-6">
        <span class="switch switch-sm">
            <label>
                <input type="checkbox" name="principal" {{$telefono?->principal ? 'checked' : ''}} value="1">
                <span></span>
                &nbsp;<i class="flaticon-star text-warning"></i>&nbsp;Principal
            </label>
        </span>
    </div>
</div>