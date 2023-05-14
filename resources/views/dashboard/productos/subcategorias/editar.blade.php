<input type="hidden" name="id" class="id" value="{{$subcategoria->id}}">
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Nombre</label>
    <div class="col-lg-10">
        <div class="input-group flex-nowrap">
            <input type="text" name="nombre" placeholder="Nombre subcategoria" value="{{$subcategoria?->nombre}}" class="form-control nombreEditar" required>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Categoria</label>
    <div class="col-lg-10">
        <div class="input-group flex-nowrap">
            <select name="id_categoria" class="form-control" id="selectCategoria" data-placeholder="Seleccione la categoria" required>
                <option value="{{$subcategoria?->categoria?->id}}" selected>{{$subcategoria?->categoria?->nombre}}</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right">Descripción</label>
    <div class="col-lg-10">
        <div class="input-group flex-nowrap">
            <textarea name="descripcion" class="summernote">{!! html_entity_decode($subcategoria?->descripcion , ENT_QUOTES, "UTF-8") !!}</textarea>
        </div>
    </div>
</div>