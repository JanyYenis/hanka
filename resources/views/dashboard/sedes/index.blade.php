@extends("dashboard.layouts.index")

@section('contenido')
<br>
<div class="card-body pt-2 pb-0 mt-n3">
    <main>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="tabSedes" href="#verSedes" data-toggle="tab">Gestion Sedes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tabPaises" href="#verPaises" data-toggle="tab">Gestion Paises</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tabSpinner" href="#verSpinner" data-toggle="tab">Spinner</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="verSedes">
                <br>
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Listado Sedes
                        </h3>
                    </div>
                </div>
            
                <div class="container">
                    @component('dashboard.sedes.listado')
                    @endcomponent
                </div>
            </div>
            <div class="tab-pane" id="verPaises">
                <br>
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Listado Paises
                        </h3>
                    </div>
                </div>
            
                <div class="container">
                    @component('dashboard.sedes.paises.listado')
                    @endcomponent
                </div>
            </div>
            <div class="tab-pane" id="verSpinner">
                <br>
                <div class="overlay overlay-block rounded">
                    <div class="overlay-wrapper p-5">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to.
                    </div>
                    <div class="overlay-layer rounded bg-primary-o-20">
                        <div class="spinner spinner-primary"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/sedes/principal.js') }}"></script>
@endsection

@section('modal')
    @component('dashboard.sedes.modals')
    @endcomponent

    @component('dashboard.sedes.crear')
    @endcomponent
    
    @component('dashboard.sedes.paises.crear')
    @endcomponent
    
    @component('dashboard.sedes.paises.modals')
    @endcomponent
    
    @component('dashboard.sedes.ciudades.modals')
    @endcomponent
@endsection