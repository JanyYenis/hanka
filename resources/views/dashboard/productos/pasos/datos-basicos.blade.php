@php
    $producto = $producto ?? null;
    $marca = $producto?->marca ?? null;
    $subcategoria = $producto?->subcategoria ?? null;
@endphp
<div class="form-group row">
    <div class="col-lg-6">
        <label class="requerido">Nombre</label>
        <input type="text" class="form-control" name="nombre_producto" placeholder="Nombre producto" value="{{$producto?->nombre_producto ?? ''}}" required/>
        <span class="form-text text-muted">Nombre producto</span>
    </div>
    <div class="col-lg-6">
        <label class="requerido">Imagen</label>
        <input type="file" class="form-control" name="imagen_ruta" accept="image/*" placeholder="Imagen producto" required/>
        <span class="form-text text-muted">Ingrese la imagen del producto</span>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label class="requerido">Cantidad</label>
        <div class="input-group">
            <input type="text" class="form-control touchspin" name="cantidad" value="{{$producto?->cantidad ?? 0}}" required/>
        </div>
        <span class="form-text text-muted">Cantidad de ejemplares</span>
    </div>
    <div class="col-lg-6">
        <label class="requerido">Marca</label>
        <div class="input-group">
            <select name="id_marca" class="form-control selectMarca" data-placeholder="Seleccione la marca" required>
                @if ($marca)
                    <option value="{{$marca?->id}}" selected>{{$marca?->nombre}}</option>
                @endif
            </select>
        </div>
        <span class="form-text text-muted">Seleccione la marca del producto</span>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label class="requerido">Categoria</label>
        <div class="input-group">
            <select name="id_categoria" class="form-control" id="selectCategoria"  data-placeholder="Seleccione la categoria" required>
                @if ($subcategoria)
                    <option value="{{$subcategoria?->categoria?->id}}" selected>{{$subcategoria?->categoria?->nombre}}</option>
                @endif
            </select>
        </div>
        <span class="form-text text-muted">Seleccione la categoria</span>
    </div>
    <div class="col-lg-6">
        <label class="requerido">Subcategoria</label>
        <div class="input-group">
            <select name="id_subcategoria" class="form-control" id="selectSubcategoria" title="Seleccione la subcategoria" data-subcategoria="{{$subcategoria?->id ?? null}}" required></select>
        </div>
        <span class="form-text text-muted">Selecciona la subcategoria</span>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12">
        <label class="requerido">Descripción</label>
        <textarea name="descripcion" class="summernote descripcion" required>{!! html_entity_decode($producto?->descripcion ?? '' , ENT_QUOTES, "UTF-8") !!}</textarea>
        <span class="form-text text-muted">Descripción del producto</span>
    </div>
</div>