@php
    $paginaInicial = 1;
    $paginaActual  = $paginaActual ?? 1;
    $paginaFinal   = $ultimaPagina ?? 1;

    $paginaInicio = $paginaInicial;
    $paginaMaxima = $paginaFinal;

    $paginaAnterior  = $paginaActual - 1;
    $paginaSiguiente = $paginaActual + 1;
@endphp
<div class="container">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <div class="d-flex align-items-center py-3">
            <select class="slectCantidadPorPagina form-control form-control text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;">
                <option value="3">3</option>
                <option value="6" selected>6</option>
                <option value="9">9</option>
                <option value="12">12</option>
                <option value="15">15</option>
            </select>
            <span class="text-muted">{{count($catidadDatos)}} resultado(s)</span>
        </div>
        <div class="d-flex flex-wrap py-2 mr-3">
            <a href="#" class="btn btn-icon btn-light-primary mr-2 my-1 btnPagina 
                {{$paginaActual <= $paginaInicial ? 'disabled' : ''}}" data-pagina="{{$paginaInicial}}">
                <i class="flaticon2-fast-back icon-xs"></i>
            </a>
            <a href="#" class="btn btn-icon btn-light-primary mr-2 my-1 btnPagina 
                {{$paginaActual <= $paginaInicial ? 'disabled' : ''}}" data-pagina="{{$paginaAnterior}}">
                <i class="flaticon2-back icon-xs"></i>
            </a>
    
            @for($i = $paginaInicio ; $i <= $paginaMaxima ; $i++)
                <a href="#" class="btn btn-icon border-0 btn-hover-primary mr-2 my-1 btnPagina 
                    {{$i == $paginaActual ? 'disabled' : ''}} {{$i == $paginaActual ? 'btn-primary' : ''}}" data-pagina="{{$i}}">{{$i}}
                </a>
            @endfor
    
            <a href="#" class="btn btn-icon btn-light-primary mr-2 my-1 btnPagina 
                {{$paginaActual >= $paginaFinal ? 'disabled' : ''}}" data-pagina="{{$paginaSiguiente}}">
                <i class="flaticon2-next icon-xs"></i>
            </a>
            <a href="#" class="btn btn-icon btn-light-primary mr-2 my-1 btnPagina 
                {{$paginaActual >= $paginaFinal ? 'disabled' : ''}}" data-pagina="{{$paginaFinal}}">
                <i class="flaticon2-fast-next icon-xs"></i>
            </a>
        </div>
    </div>
</div>