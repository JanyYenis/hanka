@php
    
@endphp
@extends("layouts.index")

@section('contenido')
<div class="container py-5">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-6">
                <ul class="list-inline shop-top-menu pb-3 pt-1">
                    <li class="list-inline-item">
                        <a class="h3 text-dark text-decoration-none mr-3" href="#">Realizar pedido</a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="formHacerPedido">
            <div class="wizard wizard-1" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="true">
                <!--begin::Wizard Nav-->
                <div class="wizard-nav">
                    <div class="wizard-steps p-8 p-lg-10 p-sm-5">
                        <!--begin::Wizard Step 1 Nav-->
                        <div class="wizard-step pasoClickeable" data-paso="1" data-wizard-type="step" data-wizard-state="current">
                            <div class="wizard-label">
                                <i class="wizard-icon flaticon-edit-1"></i>
                                <h3 class="wizard-title">
                                    1. Detalles del pedido
                                </h3>
                            </div>
                            <span class="svg-icon svg-icon-xl wizard-arrow">
                                <i class="wizard-icon fas fa-angle-right icon-2x"></i>
                            </span>
                        </div>
                        <!--end::Wizard Step 1 Nav-->
                        <!--begin::Wizard Step 2 Nav-->
                        <div class="wizard-step pasoClickeable" data-paso="2" data-wizard-type="step" data-wizard-state="pending">
                            <div class="wizard-label">
                                <i class="wizard-icon fas fa-hand-holding-usd"></i>
                                <h3 class="wizard-title">
                                    2. Prefactura
                                </h3>
                            </div>
                            <span class="svg-icon svg-icon-xl wizard-arrow">
                                <i class="wizard-icon fas fa-angle-right icon-2x"></i>
                            </span>
                        </div>
                        <!--end::Wizard Step 2 Nav-->
                    </div>
                </div>
                <!--end::Wizard Nav-->
                <!--begin::Wizard Body-->
                <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                    <div class="col-xl-12 col-xxl-7">
                        <!--begin::Wizard Step 1-->
                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                            <div id="" class="form-group row">
                                <div class="col-12">
                                    <div class="alert alert-custom alert-outline-primary fade show mb-5" role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                        <div class="alert-text">
                                            <span>Para su información:</i></span><br>
                                            <ul class="">
                                                <li>Esta seccion es para realizar el su pedido. Una vez realizado el pedido el pedido pasar al estado de Por pagar,
                                                    una ves se efectue el pago se enviara el o los producto(s).
                                                </li>
                                                <li>Si el pedido pasa mas de dos dias sin a verce efectuado el pago el pedido se eliminara.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @component('tienda.pedidos.pasos.paso-1')
                                @slot('usuario', $usuario)
                                @slot('telefono', $telefono)
                                @slot('tipos', $tipos)
                                @slot('sede', $sede)
                                @slot('puntos', $puntos)
                                @slot('subtotal', $subtotal)
                                @slot('productos', $productos)
                            @endcomponent
                        </div>
                        <!--end::Wizard Step 1-->
                        <!--begin::Wizard Step 2-->
                        <div class="pb-5" data-wizard-type="step-content">
                            @component('tienda.pedidos.pasos.paso-2')
                                @slot('usuario', $usuario)
                                @slot('telefono', $telefono)
                                @slot('carritos', $carritos)
                                @slot('sede', $sede)
                                @slot('puntos', $puntos)
                                @slot('subtotal', $subtotal)
                            @endcomponent
                        </div>
                        <!--end::Wizard Step 2-->
                    </div>
    
                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                        <div class="mr-2">
                            <button type="button" class="beforePrev btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Atras</button>
                        </div>
                        <div>
                            <button type="submit" class="btnGuardarPedido btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Realizar Pedido</button>
                            <button type="button" class="beforeNext btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Siguiente</button>
                        </div>
                    </div>
                </div>
                <!--end::Wizard Body-->
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ mix('js/pedidos/wizard-1.js') }}"></script>
@endsection