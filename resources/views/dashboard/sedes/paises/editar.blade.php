<input type="hidden" name="id" value="{{$pais->id}}">
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right ">Nombre:</label>
    <div class="col-lg-4">
        <div class="input-group flex-nowrap">
            <input type="text" name="nombre" placeholder="Nombre del pais" class="form-control" value="{{$pais?->nombre ?? ''}}" required>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right ">Ruta bandera:</label>
    <div class="col-lg-7">
        <div class="input-group flex-nowrap">
            <input type="text" id="ruta" name="ruta" placeholder="Agrege la ruta de la bandera" class="form-control" value="{{$pais?->ruta ?? ''}}">
        </div>
    </div>
    <div  class="col-lg-2">
        <button id="verImagen" type="button" class="btn btn-primary">Ver Imagen</button>
    </div>
</div>
<div class="col-md-4 col-lg-12 col-xxl-4">
    <div class="text-center mb-7" id="imagenE">
        @if ($pais?->ruta)
            <img src="{{$pais?->ruta}}" alt="" width="100%" height="250%" id="imangenBanera">
        @endif
    </div>
</div>