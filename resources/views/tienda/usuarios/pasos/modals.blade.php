<div class="modal fade" id="modalCrearTelefono" tabindex="-1" role="dialog" aria-labelledby="modalCrearTelefono"
    aria-hidden="true" data-backdrop="static">
    <form id="formCrearTelefono">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Crear Telefono</h5>
                    <button type="button" class="btn btn-outline-secondary fas fa-times icon-2x" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errores">
                        @component('sistema/div-errores')
                        @endcomponent
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-sm-right requerido">Tipo Teléfono</label>
                        <div class="col-lg-4">
                            <select title="Seleccione el tipo" class="form-control kt-selectpiker tiposTelefonos" name="tipo" required>
                                @foreach ($tiposTelefonos as $tipo)
                                    <option value="{{$tipo?->codigo}}">{{$tipo?->nombre}}</option>
                                @endforeach
                            </select>
                            <span class="form-text text-muted">Móvil, Fijo</span>
                        </div>
                        <label class="col-lg-2 col-form-label text-sm-right requerido">Teléfono</label>
                        <div class="col-lg-4">
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-phone-alt"></i>
                                    </span>
                                </div>
                                <input type="tel" name="numero" id="tel" class="form-control tel" required>
                            </div>
                            <span class="form-text text-muted">Ingrese su telefono</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-xl-6">
                            <span class="switch switch-sm">
                                <label>
                                    <input type="checkbox" id="tieneWhatsapp" name="whatsapp" value="1">
                                    <span></span>
                                    &nbsp;<i class="text-success flaticon-whatsapp"></i>&nbsp;WhatsApp
                                </label>
                            </span>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <span class="switch switch-sm">
                                <label>
                                    <input type="checkbox" name="principal" value="1">
                                    <span></span>
                                    &nbsp;<i class="flaticon-star text-warning"></i>&nbsp;Principal
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

{{-- Modal Editar --}}
<div class="modal fade" id="modalEditarTelefono" tabindex="-1" role="dialog" aria-labelledby="modalEditarTelefono"
    aria-hidden="true" data-backdrop="static">
    <form id="formEditarTelefono">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Editar Telefono</h5>
                    <button type="button" class="btn btn-outline-secondary fas fa-times icon-2x" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errores">
                        @component('sistema/div-errores')
                        @endcomponent
                    </div>
                    <div id="editarTelefono"></div>
                </div>
                <div class="modal-footer botonesModal">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>