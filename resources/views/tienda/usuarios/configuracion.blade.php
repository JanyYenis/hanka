@extends("layouts.index")

@section('contenido')
<div class="container py-5">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-6">
                <ul class="list-inline shop-top-menu pb-3 pt-1">
                    <li class="list-inline-item">
                        <a class="h3 text-dark text-decoration-none mr-3" href="#">Configuración Notificaciones</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container py-5">
            <!--begin::Form-->
            <form class="form">
                <div class="row">
                    <label class="col-xl-3"></label>
                    <div class="col-lg-9 col-xl-6">
                        <h5 class="font-weight-bold mb-6">Configuración de notificaciones</h5>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label class="col-xl-3 col-lg-3 col-form-label font-weight-bold text-left text-lg-right">Notificación por correo</label>
                    <div class="col-lg-9 col-xl-6">
                        <span class="switch switch-sm">
                            <label>
                                <input type="checkbox" id="notificacionCorreo" checked="checked" name="notification_email" value="1">
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label class="col-xl-3 col-lg-3 col-form-label font-weight-bold text-left text-lg-right">Notificación por chat</label>
                    <div class="col-lg-9 col-xl-6">
                        <span class="switch switch-sm">
                            <label>
                                <input type="checkbox" id="notificacionChat" name="notification_chat" value="1">
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div>
                <div class="separator separator-dashed my-10"></div>
                <div class="row">
                    <label class="col-xl-3"></label>
                    <div class="col-lg-9 col-xl-6">
                        <h5 class="font-weight-bold mb-6">Permisos de notificación por correo</h5>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label font-weight-bold text-left text-lg-right"></label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="checkbox-list">
                            <label class="checkbox">
                            <input type="checkbox" value="1" name="respuesta_pqrs" checked="checked">
                            <span></span>Respuesta PQRS</label>
                            <label class="checkbox">
                            <input type="checkbox" value="1" name="envio_factura" checked="checked">
                            <span></span>Enviar factura</label>
                            <label class="checkbox">
                            <input type="checkbox" value="1" name="envio_publicidad">
                            <span></span>Enviar publicidad</label>
                            <label class="checkbox">
                            <input type="checkbox" value="1" name="envio_oferta" checked="checked">
                            <span></span>Enviar promociones</label>
                            <label class="checkbox">
                            <input type="checkbox" value="1" name="envio_descuento">
                            <span></span>Enviar descuentos</label>
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed my-10"></div>
                <div class="row">
                    <label class="col-xl-3"></label>
                    <div class="col-lg-9 col-xl-6">
                        <h5 class="font-weight-bold mb-6">Permisos de notificación por chat</h5>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label font-weight-bold text-left text-lg-right"></label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="checkbox-list">
                            <label class="checkbox">
                            <input type="checkbox" value="1" name="respuesta_chat_pqrs" checked="checked">
                            <span></span>Respuesta PQRS</label>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ mix('js/tienda/principal.js') }}"></script>
@endsection