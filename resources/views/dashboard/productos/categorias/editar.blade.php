<input type="hidden" name="id" class="id" value="{{$categoria->id}}">
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Nombre</label>
    <div class="col-lg-10">
        <div class="input-group flex-nowrap">
            <input type="text" name="nombre" placeholder="Nombre categoria" value="{{$categoria?->nombre}}" class="form-control nombreEditar" required>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right">Descripción</label>
    <div class="col-lg-10">
        <div class="input-group flex-nowrap">
            <textarea name="descripcion" class="summernote">{!! html_entity_decode($categoria?->descripcion , ENT_QUOTES, "UTF-8") !!}</textarea>
        </div>
    </div>
</div>
<div class="dropzone dropzone-multi" id="dropzoneArchivos">
    <div class="dropzone-panel">
        <a class="dropzone-select btn btn-light-primary font-weight-bold mr-2">Adjuntar </a>
        <div class="option-hide-dropzone d-none">
            <a class="dropzone-upload btn btn-label-brand btn-bold btn-sm">Envíar todos</a>
            <a class="dropzone-remove-all btn btn-label-brand btn-bold btn-sm">Eliminar todos</a>
        </div>
    </div>
    <div class="form-group row dropzone-editFile d-none">
        <span class="col-lg-3">Soporte Actual:</span>
    </div>
    <div class="dropzone-items form-group">
        <div class="dropzone-item" style="display:none">
            <div class="dropzone-file">
                <div class="dropzone-filename" title="some_image_file_name.jpg"><span
                        data-dz-name></span>
                    <strong>(<span data-dz-size></span>)</strong>
                </div>
            </div>
            <div class="dropzone-progress">
                <div class="progress">
                    <div class="progress-bar kt-bg-brand" role="progressbar" aria-valuemin="0"
                        aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress></div>
                </div>
            </div>
            <div class="dropzone-toolbar">
                <span class="dropzone-start d-none"><i class="flaticon2-arrow"></i></span>
                <span class="dropzone-cancel" data-dz-remove style="display: none;" >
                    <i class="flaticon2-cross"></i>
                </span>
                <span class="dropzone-delete" data-dz-remove title="Eliminar"><i class="flaticon2-cross"></i></span>
            </div>
        </div>
    </div>
    <div class="form-group row dropzone-chagefileName d-none">
        <label class="col-lg-3 col-form-label text-lg-right">Renombrar Soporte:</label>
        <div class="col-lg-9">
            <input type="text" class="form-control" name="nombre">
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="col-3 col-form-label">Mostrar banner</label>
    <div class="col-3">
    <span class="switch switch-icon">
        <label>
            <input type="checkbox" name="principal" {{$categoria?->principal ? 'checked' : ''}} class="principalEditar" value="1"/>
            <span></span>
        </label>
    </span>
    </div>
</div>