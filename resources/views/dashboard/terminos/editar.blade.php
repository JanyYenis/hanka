<input type="hidden" name="id" value="{{$termino->id}}">
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Titulo</label>
    <div class="col-lg-10">
        <div class="input-group flex-nowrap">
            <input type="text" name="titulo_condicion" placeholder="Titulo" value="{{$termino?->titulo_condicion}}" class="form-control" required>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Descripción</label>
    <div class="col-lg-10">
        <div class="input-group flex-nowrap">
            <textarea name="texto_condicion" class="summernote">{!! html_entity_decode($termino?->texto_condicion , ENT_QUOTES, "UTF-8") !!}</textarea>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="col-lg-2 col-form-label text-sm-right">Mostrar</label>
    <div class="col-lg-10">
        <span class="switch switch-icon">
            <label>
                <input type="checkbox" {{$termino?->principal ? 'checked' : ''}} name="principal" class="principal" value="1"/>
                <span></span>
            </label>
        </span>
    </div>
</div>