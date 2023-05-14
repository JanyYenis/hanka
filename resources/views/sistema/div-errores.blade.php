@php
    $claseColumnas = isset($claseColumnas) ? $claseColumnas : 'col-12';
    $claseOcultarDiv = isset($claseOcultarDiv) ? $claseOcultarDiv : 'd-none';
    $validaciones = $validaciones ?? null;
    $claseFila = isset($claseFila) ? $claseFila : "row";
@endphp
<div id="{{ $id ?? '' }}" class="form-group {{$claseFila}} div-validacion {{ $claseOcultarDiv }}">
    <div class="{{ $claseColumnas }}">
        <div class="alert alert-custom alert-outline-danger fade show mb-5" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">
                <span>Confirma la información en los siguientes campos:</i></span><br>
                <ul class="mensaje-validacion {{ $clases ?? '' }}">
                    @if ($validaciones)
                        @foreach ($validaciones as $validacion)
                            <li>
                                {{ $validacion }}
                            </li> 
                        @endforeach
                    @endif   
                </ul>
            </div>
        </div>
    </div>
</div>