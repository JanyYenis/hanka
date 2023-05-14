<div class="modal fade" id="modalCrearSedes" tabindex="-1" role="dialog" aria-labelledby="modalCrearSedes"
    aria-hidden="true" data-backdrop="static">
    <form id="formCrearSedes">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Crear Sedes</h5>
                    <button type="button" class="btn-close fas fa-times icon-2x" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errores">
                        @component('sistema/div-errores')
                        @endcomponent
                    </div>
                    <div class="form-group row">
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">Nombre</label>
                        <div class="col-lg-4">
                            <div class="input-group flex-nowrap">
                                <input type="text" name="nombre" placeholder="Nombre sede" class="form-control" required>
                            </div>
                        </div>
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">Direccion</label>
                        <div class="col-lg-3">
                            <div class="input-group flex-nowrap">
                                <input type="text" name="direccion" placeholder="Direccion" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">E-mail</label>
                        <div class="col-lg-9">
                            <div class="input-group flex-nowrap">
                                <input type="text" name="email" placeholder="_@_" class="form-control email" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-sm-right">Pais</label>
                        <div class="col-lg-4">
                            <div class="input-group flex-nowrap">
                                <select class="kt-select2 form-control select-menu" id="selectPais" data-placeholder="Seleccione el pais" name="pais">
                                </select>
                            </div>
                        </div>
                        <label class=" col-lg-2 col-form-label text-sm-right">Ciudad</label>
                        <div class="col-lg-3">
                            <div class="input-group flex-nowrap">
                                <select class="form-control selectCiudad" title="Seleccione las ciudad" name="id_ciudad">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="duplicarTelefono" class="form-group row">
                        <label class="col-lg-2 col-form-label text-right">Telefono</label>
                        <div class="col-lg-5">
                            <div class="mb-2">
                                <div class="input-group" id="seccionTel">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-phone-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control tel" name="numero"/>
                                    {{-- <div class="input-group-append">
                                        <a href="javascript:;" class="btn font-weight-bold btn-danger btn-icon">
                                            <i class="la la-close"></i>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <div class="col-lg-3"></div>
                                <div class="col">
                                    <div data-repeater-create="" class="btn font-weight-bold btn-warning">
                                        <i class="la la-plus"></i>
                                        Add
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <label class="col-1 col-form-label text-right">Principal</label>
                        <div class="col-3">
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