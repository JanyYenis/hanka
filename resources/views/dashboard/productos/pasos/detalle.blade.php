@php
    $producto = $producto ?? null;
@endphp
<div class="form-group row">
    <div class="col-lg-6">
        <label class="requerido">Precio</label>
        <input type="text" class="form-control" name="precio_venta" required value="{{$producto?->precio_venta ?? ''}}"/>
        <span class="form-text text-muted">Valor producto</span>
    </div>
    <div class="col-lg-6">
        <label>Garantia</label>
        <input type="text" class="form-control" name="garantia" placeholder="Garantia" value="{{$producto?->garantia ?? ''}}"/>
        <span class="form-text text-muted">Garantia del producto</span>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-6">
        <label>IVA</label>
        <input type="text" class="form-control touchspin" name="iva" value="{{$producto?->iva ?? ''}}"/>
        <span class="form-text text-muted">IVA del producto</span>
    </div>
    <div class="col-lg-6">
        <label>Descuento</label>
        <div class="input-group">
            <input type="text" class="form-control touchspin" name="descuento" value="{{$producto?->descuento ?? ''}}"/>
        </div>
        <span class="form-text text-muted">Descuento de ejemplares</span>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12">
        <label>Oferta</label>
        <textarea name="oferta" class="summernote oferta">{!! html_entity_decode($producto?->oferta , ENT_QUOTES, "UTF-8") !!}</textarea>
        <span class="form-text text-muted">Oferta del producto</span>
    </div>
</div>