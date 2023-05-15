<div class="modal fade" id="modalCrearTerminos" tabindex="-1" role="dialog" aria-labelledby="modalCrearTerminos"
    aria-hidden="true" data-backdrop="static">
    <form id="formCrearTerminos">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Crear Terminos Y Condiciones</h5>
                    <button type="button" class="btn btn-outline-secondary fas fa-times icon-2x" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errores">
                        @component('sistema/div-errores')
                        @endcomponent
                    </div>
                    <div class="form-group row">
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">Titulo</label>
                        <div class="col-lg-10">
                            <div class="input-group flex-nowrap">
                                <input type="text" name="titulo_condicion" placeholder="Titulo" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">Descripción</label>
                        <div class="col-lg-10">
                            <div class="input-group flex-nowrap">
                                <textarea name="texto_condicion" class="summernote" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-sm-right">Mostrar</label>
                        <div class="col--lg-10">
                        <span class="switch switch-icon">
                            <label>
                                <input type="checkbox" name="principal" class="principal" value="1"/>
                                <span></span>
                            </label>
                        </span>
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