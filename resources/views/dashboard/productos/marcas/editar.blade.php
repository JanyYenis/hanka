<input type="hidden" name="id" value="{{$marca->id}}">
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Nombre</label>
    <div class="col-lg-10">
        <div class="input-group flex-nowrap">
            <input type="text" name="nombre" placeholder="Nombre marca" value="{{$marca?->nombre}}" class="form-control" required>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right">Descripción</label>
    <div class="col-lg-10">
        <div class="input-group flex-nowrap">
            <textarea name="descripcion" class="summernote">{!! html_entity_decode($marca?->descripcion , ENT_QUOTES, "UTF-8") !!}</textarea>
        </div>
    </div>
</div>