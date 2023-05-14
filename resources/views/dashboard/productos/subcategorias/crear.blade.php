<div class="modal fade" id="modalCrearSubcategorias" tabindex="-1" role="dialog" aria-labelledby="modalCrearSubcategorias"
    aria-hidden="true" data-backdrop="static">
    <form id="formCrearSubcategorias">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Crear Subcategorias</h5>
                    <button type="button" class="btn-close fas fa-times icon-2x" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errores">
                        @component('sistema/div-errores')
                        @endcomponent
                    </div>
                    <div class="form-group row">
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">Nombre</label>
                        <div class="col-lg-10">
                            <div class="input-group flex-nowrap">
                                <input type="text" name="nombre" placeholder="Nombre Subcategoria" class="form-control nombre" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">Categoria</label>
                        <div class="col-lg-10">
                            <div class="input-group flex-nowrap">
                                <select name="id_categoria" class="form-control" id="selectCategoria" data-placeholder="Seleccione la categoria" required>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-lg-2 col-form-label text-sm-right">Descripción</label>
                        <div class="col-lg-10">
                            <div class="input-group flex-nowrap">
                                <textarea name="descripcion" class="summernote"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer botonesModal">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>