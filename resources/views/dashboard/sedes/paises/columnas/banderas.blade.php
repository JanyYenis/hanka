@php
    $ruta = $ruta ?? null;
    $nombre = $nombre ?? 'N/A';
@endphp
<span style="width: 250px;">
    <div class="d-flex align-items-center">
        <div class="symbol symbol-40 flex-shrink-0">
            @if ($ruta)
                <img src="{{$ruta}}" class="symbol-label" alt="" width="10%" height="10%">
            @else
                <div class="symbol-label"><i class="far fa-flag icon-2x"></i></div>
            @endif
        </div>
        @if ($nombre)
            <div class="ml-2">
                <div class="text-dark-75 font-weight-bold line-height-sm">{{$nombre}}</div>
            </div>
        @endif
    </div>
</span>