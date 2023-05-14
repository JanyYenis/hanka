{{-- Modal para editar un cargo --}}
<div class="modal fade" id="modalEditarCargo" tabindex="-1" role="dialog" aria-labelledby="modalEditarCargo"
    aria-hidden="true" data-backdrop="static">
    <form id="formEditarCargo">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Editar Cargo</h5>
                    <button type="button" class="btn-close fas fa-times icon-2x" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errores">
                        @component('sistema/div-errores')
                        @endcomponent
                    </div>
                    <div id="editarCargo"></div>
                </div>
                <div class="modal-footer botonesModal">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>