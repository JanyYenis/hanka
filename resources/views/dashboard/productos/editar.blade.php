<input type="hidden" name="id" value="{{$producto->id}}">
<div class="wizard wizard-1" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="true">
    <!--begin::Wizard Nav-->
    <div class="wizard-nav">
        <div class="wizard-steps p-8 p-lg-10">
            <!--begin::Wizard Step 1 Nav-->
            <div class="wizard-step pasoClickeable" data-paso="1" data-wizard-type="step" data-wizard-state="current">
                <div class="wizard-label">
                    <i class="wizard-icon fas fa-info-circle"></i>
                    <h3 class="wizard-title">
                        1. Datos Basicos
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
                        2. Detalles del producto
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
                @component('dashboard.productos.pasos.datos-basicos')
                    @slot('producto', $producto)
                @endcomponent
            </div>
            <!--end::Wizard Step 1-->
            <!--begin::Wizard Step 2-->
            <div class="pb-5" data-wizard-type="step-content">
                @component('dashboard.productos.pasos.detalle')
                    @slot('producto', $producto)
                @endcomponent
            </div>
            <!--end::Wizard Step 2-->
        </div>

        <div class="d-flex justify-content-between border-top mt-5 pt-10">
            <div class="mr-2">
                <button type="button" class="beforePrev btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Atras</button>
            </div>
            <div>
                <button type="submit" class="btnActualizarProducto btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Actualizar</button>
                <button type="button" class="beforeNext btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Siguiente</button>
            </div>
        </div>
    </div>
    <!--end::Wizard Body-->
</div>