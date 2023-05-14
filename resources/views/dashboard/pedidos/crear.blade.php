<div class="modal fade" id="modalCrearProductos" tabindex="-1" role="dialog" aria-labelledby="modalCrearProductos"
    aria-hidden="true" data-backdrop="static">
    <form id="formCrearProductos" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Crear Productos</h5>
                    <button type="button" class="btn-close fas fa-times icon-2x" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errores">
                        @component('sistema/div-errores')
                        @endcomponent
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="requerido">Nombre</label>
                            <input type="text" class="form-control" name="nombre_producto" placeholder="Nombre producto" value="{{$producto?->nombre_producto ?? ''}}" required/>
                            <span class="form-text text-muted">Nombre producto</span>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </form>
</div>