<div class="col-lg-12">
    @component('dashboard/sedes/paises/columnas/banderas')
    @slot('nombre', $pais?->nombre ?? 'Sin nombre')
    @slot('ruta', $pais?->ruta ?? null)
    @endcomponent
</div>
<input type="hidden" value="{{$pais?->id ?? null}}" id="idPaisCrearCiudad">
<div class="col-lg-12">
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="tablaCiudades">
            <thead>
                <tr>
                    <th class="text-center all" width="3%">#</th>
                    <th class="text-center all" width="5%">Nombre</th>
                    <th class="text-center all" width="5%">Estado</th>
                    <th class="text-center all" width="3%">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>