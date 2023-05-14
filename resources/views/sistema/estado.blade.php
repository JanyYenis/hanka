
@php
    $color = $concepto?->color ?? '';
    $icono = $concepto?->icono ?? '';
    $nombreConcepto = $concepto?->nombre ?? '';
@endphp
{{-- <span class="btn btn-light-{{$color}} font-weight-bolder btn-sm">
    @if ($icono)
        <i class="kt-font-{{$color}} fa {{$icono}}" disabled></i>
    @endif
    {{" ".$nombreConcepto}}
</span> --}}
<div class="align-self-center text-lg-center">
    <div class="kt-checkbox-inline">
        <span class="label label-light-{{$color}} label-pill label-inline mr-2 label-xl">
            <i class="{{$icono}} text-{{$color}}"></i>&nbsp;{{ initcap($nombreConcepto) }}
        </span>
    </div>
</div>