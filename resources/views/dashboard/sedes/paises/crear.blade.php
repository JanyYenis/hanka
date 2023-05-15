<div class="modal fade" id="modalCrearPaises" tabindex="-1" role="dialog" aria-labelledby="modalCrearPaises"
    aria-hidden="true" data-backdrop="static">
    <form id="formCrearPaises">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Crear Paises</h5>
                    <button type="button" class="btn btn-outline-secondary fas fa-times icon-2x btnLimpiar" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errores">
                        @component('sistema/div-errores')
                        @endcomponent
                    </div>
                    <div class="form-group row">
                        <label class=" col-lg-2 col-form-label text-sm-right ">Nombre:</label>
                        <div class="col-lg-4">
                            <div class="input-group flex-nowrap">
                                <input type="text" name="nombre" placeholder="Nombre del pais" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-lg-2 col-form-label text-sm-right ">Ruta bandera:</label>
                        <div class="col-lg-7">
                            <div class="input-group flex-nowrap">
                                <input type="text" id="ruta" name="ruta" placeholder="Agrege la ruta de la bandera" class="form-control">
                            </div>
                        </div>
                        <div  class="col-lg-2">
                            <button id="verImagen" type="button" class="btn btn-primary">Ver Imagen</button>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-12 col-xxl-4">
                        <div class="card card-custom overlay">
                            <div class="card-body p-0">
                                <div class="overlay-wrapper" id="imagen">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer botonesModal">
                    <button type="button" class="btn btn-secondary btnLimpiar" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>