@extends("layouts.index")

@section('contenido')
<div class="container py-5">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-6">
                <ul class="list-inline shop-top-menu pb-3 pt-1">
                    <li class="list-inline-item">
                        <a class="h3 text-dark text-decoration-none mr-3" href="#">Favoritos</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card" id="seccionListadoFavoritos">
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ mix('js/tienda/favoritos.js') }}"></script>
@endsection