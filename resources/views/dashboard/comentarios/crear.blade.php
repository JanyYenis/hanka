@php
    $producto = $producto ?? null;
    $fecha = now();
@endphp
<input type="hidden" name="id_producto" value="{{$producto?->id}}">
<input type="hidden" name="id_usuario" value="1000">
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right">Fecha</label>
    <div class="col-lg-10">
        <div class="input-group flex-nowrap">
            <input type="text" name="fecha" value="{{$fecha->format('Y-m-d')}}" readonly placeholder="Titulo" class="form-control" required>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right">Producto</label>
    <div class="col-lg-10">
        <div class="input-group flex-nowrap">
            <input type="text" name="nombre_producto" value="{{$producto?->nombre_producto}}" readonly placeholder="Titulo" class="form-control" required>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right">Calificación</label>
    <label class="clasificacion col-lg-10">
        <input id="radio1" type="radio" name="estrellas" value="5">
        <label class="estrella" for="radio1">★</label>
        <input id="radio2" type="radio" name="estrellas" value="4">
        <label class="estrella" for="radio2">★</label>
        <input id="radio3" type="radio" name="estrellas" value="3">
        <label class="estrella" for="radio3">★</label>
        <input id="radio4" type="radio" name="estrellas" value="2">
        <label class="estrella" for="radio4">★</label>
        <input id="radio5" type="radio" name="estrellas" value="1">
        <label class="estrella" for="radio5">★</label>
    </label>
</div>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Descripción</label>
    <div class="col-lg-10">
        <div class="input-group flex-nowrap">
            <textarea name="comentario" class="summernote" required></textarea>
        </div>
    </div>
</div>