@php
    $sede = session()->get('sede') ?? null;
    $telefono = $sede?->telefonoPrincipal ?? null;
@endphp
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Hanka</h5>
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            <span class="text-muted font-weight-bold mr-4"><i class="flaticon2-black-back-closed-envelope-shape icon-nm"></i>  {{$sede?->email ?? 'hankasa@gmail.com'}}</span>
            <span class="text-muted font-weight-bold mr-4"><i class="fas fa-phone-alt"></i>  {{$telefono?->numero ? formatoTelefono($telefono?->numero) : '+57 315-209-4191'}}</span>
        </div>
    </div>
</div>
<!--end::Subheader-->