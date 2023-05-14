{{-- Crear PQRS --}}
<div class="modal fade" id="modalVerPqrs" tabindex="-1" role="dialog" aria-labelledby="modalVerPqrs"
    aria-hidden="true" data-backdrop="static">
    <form id="formVerPqrs">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">PQRS</h5>
                    <button type="button" class="btn-close btnRefrescarTablaPqrs" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="contenidoVerPqrs"></div>
                </div>
                <div class="modal-footer botonesModal">
                    <button type="button" class="btn btn-secondary btnRefrescarTablaPqrs" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success d-none" id="GuardarPrqs">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- Ver y responder PQRS --}}
<div class="modal fade" id="modalCrearPqrs" tabindex="-1" role="dialog" aria-labelledby="modalCrearPqrs"
    aria-hidden="true" data-backdrop="static">
    <form id="formPqrs">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">PQRS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errores">
                        @component('sistema/div-errores')
                        @endcomponent
                    </div>
                    <div id="contenidoPqrs">
                        <div id="opcion" class="d-none">
                            @component('pqrs.crear')
                            @endcomponent
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