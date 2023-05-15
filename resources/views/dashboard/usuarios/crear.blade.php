<div class="modal fade" id="modalCrearUsuario" tabindex="-1" role="dialog" aria-labelledby="modalCrearUsuario"
    aria-hidden="true" data-backdrop="static">
    <form id="formCrearUsuario">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Crear Usuario</h5>
                    <button type="button" class="btn btn-outline-secondary fas fa-times icon-2x" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="errores">
                        @component('sistema/div-errores')
                        @endcomponent
                    </div>
                    <div class="form-group row">
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">Nombres</label>
                        <div class="col-lg-4">
                            <div class="input-group flex-nowrap">
                                <input type="text" name="nombre" placeholder="Nombre usuario" class="form-control" required>
                            </div>
                        </div>
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">Apellidos</label>
                        <div class="col-lg-3">
                            <div class="input-group flex-nowrap">
                                <input type="text" name="apellido" placeholder="Apellidos usuario" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">Tipo Identificacion</label>
                        <div class="col-lg-4">
                            <div class="input-group flex-nowrap">
                                <select name="tipo_documento" title="Seleccione T.I" class="form-control kt-selectpiker" required>
                                    @foreach ($tiposDocumentos as $tipo)
                                        <option value="{{$tipo?->codigo}}">{{$tipo?->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">Identificacion</label>
                        <div class="col-lg-3">
                            <div class="input-group flex-nowrap">
                                <input type="text" name="documento" placeholder="Numero de documento" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">Genero</label>
                        <div class="col-lg-4">
                            <div class="input-group flex-nowrap">
                                <select name="genero" title="Seleccione su genero" class="form-control kt-selectpiker" required>
                                    @foreach ($tiposGeneros as $tipo)
                                        <option value="{{$tipo?->codigo}}">{{$tipo?->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">Fecha nacimiento</label>
                        <div class="col-lg-3">
                            <div class="input-group flex-nowrap">
                                <input id="fecha" type="text" name="fecha_nacimiento" placeholder="Nacimiento" class="form-control fecha" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-lg-2 col-form-label text-sm-right">Tel</label>
                        <div class="col-lg-4">
                            <div class="input-group flex-nowrap">
                                <input type="tel" name="telefono" placeholder="Telefono" id="tel" class="form-control tel">
                            </div>
                        </div>
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">E-mail</label>
                        <div class="col-lg-3">
                            <div class="input-group flex-nowrap">
                                <input type="text" name="email" placeholder="_@_" class="form-control email" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">Direccion</label>
                        <div class="col-lg-9">
                            <div class="input-group flex-nowrap">
                                <input type="text" name="direccion" placeholder="Direccion" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">Pais</label>
                        <div class="col-lg-4">
                            <div class="input-group flex-nowrap">
                                <select class="form-control selectPais" data-placeholder="Seleccione el pais" name="pais" required>
                                </select>
                            </div>
                        </div>
                        <label class=" col-lg-2 col-form-label text-sm-right requerido">Ciudad</label>
                        <div class="col-lg-3">
                            <div class="input-group flex-nowrap">
                                <select class="form-control selectCiudad" title="Seleccione las ciudad" name="id_ciudad" required>
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