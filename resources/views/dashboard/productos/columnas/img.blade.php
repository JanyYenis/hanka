@php
    $ruta = $ruta ?? asset('img/productos/por-defecto.png');
@endphp
<div class="card card-custom overlay">
    <div class="card-body p-0">
        <div class="overlay-wrapper">
          <img src="{{$ruta}}" alt="" class="w-100 rounded"/>
        </div>
    </div>
</div>