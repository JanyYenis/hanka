<input type="hidden" name="id" value="{{$cargo->id}}">
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Nombre</label>
    <div class="col-lg-10">
        <div class="input-group flex-nowrap">
            <input type="text" name="nombre" placeholder="Nombre cargo" class="form-control" value="{{$cargo?->nombre}}" required>
        </div>
    </div>
</div>