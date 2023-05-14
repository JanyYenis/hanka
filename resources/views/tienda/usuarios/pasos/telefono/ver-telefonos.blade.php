@foreach ($telefonos as $telefono)
    <div class="row">
        <label class="col-lg-6 col-md-6 col-xl-6 col-12 label-left col-form-label  align-self-center">
            <li>
                <span><b>Tipo:</b> {{ initcap($telefono?->infoTipo?->nombre) }} </span>&nbsp;     
                @if($telefono?->principal)
                    <i class="flaticon-star text-warning"></i>
                    <span class="font-weight-bold">Principal</span>
                @endif <br>
                <span><b>Número:</b> {{formatoTelefono($telefono?->numero)}} </span> @if ($telefono?->whatsapp) <i class="flaticon-whatsapp text-success"></i> @endif <br>
            </li>
        </label>
        <div class="align-self-center text-lg-center">
            <div class="kt-checkbox-inline">
                <span class="label label-light-{{$telefono?->infoEstado?->color}} label-pill label-inline mr-2 label-xl">
                    <i class="{{$telefono?->infoEstado?->icono}} text-{{$telefono?->infoEstado?->color}}"></i>&nbsp;{{ initcap($telefono?->infoEstado?->nombre) }}
                </span>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xl-4 col-12 align-self-center text-lg-center">
            @component('tienda.usuarios.pasos.telefono.acciones-telefono')
                @slot("telefono", $telefono)
            @endcomponent
        </div>
    </div>
@endforeach