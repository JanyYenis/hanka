<div class="modal fade" id="modalCrearEmpleado" tabindex="-1" role="dialog" aria-labelledby="modalCrearEmpleado"
    aria-hidden="true" data-backdrop="static">
    <form id="formCrearEmpleado">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Crear Empleado</h5>
                    <button type="button" class="btn btn-outline-secondary fas fa-times icon-2x" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errores">
                        @component('sistema/div-errores')
                        @endcomponent
                    </div>
                    <div class="form-group row">
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">Usuario</label>
                        <div class="col-lg-9">
                            <div class="input-group flex-nowrap">
                                <select class="form-control selectUsuarios" data-placeholder="Seleccione el usuario" name="id_usuario" required>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">Cargos</label>
                        <div class="col-lg-9">
                            <div class="input-group flex-nowrap">
                                <select class="form-control selectCargos" data-placeholder="Seleccione el cargo" name="id_cargo" required>
                                </select>
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