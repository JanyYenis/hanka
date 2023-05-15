{{-- Modal para ver Ciudades --}}
<div class="modal fade" id="modalVerCiudades" tabindex="-1" role="dialog" aria-labelledby="modalVerCiudades"
    aria-hidden="true" data-backdrop="static">
    <form id="formVerCiudades">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Ver Ciudades</h5>
                    <button type="button" class="btn btn-outline-secondary fas fa-times icon-2x" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="verCiudades"></div>
                </div>
            </div>
        </div>
    </form>
</div>


{{-- Modal para Editar Ciudades --}}
<div class="modal fade" id="modalEditarCiudades" tabindex="-1" role="dialog" aria-labelledby="modalEditarCiudades"
    aria-hidden="true" data-backdrop="static">
    <form id="formEditarCiudades">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Editar Ciudades</h5>
                    <button type="button" class="btn btn-outline-secondary fas fa-times icon-2x btnLimpiar" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errores">
                        @component('sistema/div-errores')
                        @endcomponent
                    </div>
                    <div id="editarCiudades"></div>
                </div>
                <div class="modal-footer botonesModal">
                    <button type="button" class="btn btn-secondary btnLimpiar" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- Modal para crear Ciudades --}}
<div class="modal fade" id="modalCrearCiudades" tabindex="-1" role="dialog" aria-labelledby="modalCrearCiudades"
    aria-hidden="true" data-backdrop="static">
    <form id="formCrearCiudades">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Crear Ciudades</h5>
                    <button type="button" class="btn btn-outline-secondary fas fa-times icon-2x btnLimpiar" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errores">
                        @component('sistema/div-errores')
                        @endcomponent
                    </div>
                    <div id="crearCiudades"></div>
                </div>
                <div class="modal-footer botonesModal">
                    <button type="button" class="btn btn-secondary btnLimpiar" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>