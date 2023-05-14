@extends("dashboard.layouts.index")

@section("subheaderContent")
    <div class="row">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Filtro</h5>
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            <div>
                <select name="" id="selectAños" class="form-control kt-selectpicker">
                    @foreach ($anos as $ano)
                        <option value="{{$ano}}" {{$ano == $anoActual ? 'selected' : ''}}>{{$ano}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
@endsection


@section('contenido')
<div class="card-header border-0 pt-5">
    <h1 class="mt-4">Graficos y Estadisticas</h1>
</div><br><br>
<div class="card-body pt-2 pb-0 mt-n3">
    <main>
        <div id="seccionRefrescar">
            @component('dashboard.graficos.graficos')
            @endcomponent
        </div>
    </main>
</div>
@endsection

@section('scripts')
    <script>
        window.pqrs        = @json($pqrs);
        window.pedidos     = @json($pedidos);
        window.comentarios = @json($comentarios);
    </script>
    <script src="{{ mix('/js/graficos/principal.js') }}" ></script>
@endsection