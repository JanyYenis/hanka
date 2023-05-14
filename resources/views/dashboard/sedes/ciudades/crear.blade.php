@php
    $pais = $pais ?? null;
    $ciudad = $ciudad ?? null;
@endphp
@if ($pais)
    <input type="hidden" name="id_pais" value="{{$pais?->id ?? ''}}">
@endif
@if ($ciudad)
    <input type="hidden" name="id" value="{{$ciudad?->id ?? ''}}">
@endif
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right ">Nombre:</label>
    <div class="col-lg-4">
        <div class="input-group flex-nowrap">
            <input type="text" name="nombre" placeholder="Nombre de la ciudad" class="form-control" value="{{$ciudad ? $ciudad?->nombre : ''}}" required>
        </div>
    </div>
</div>