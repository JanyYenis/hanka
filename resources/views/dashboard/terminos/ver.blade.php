@php
    $terminos = $terminos ?? [];
@endphp
<div class="container">
    @foreach ($terminos as $termino)
        <li>{!! html_entity_decode($termino?->texto_condicion , ENT_QUOTES, "UTF-8") !!}</li>
    @endforeach
    <br>
    @foreach ($terminos as $termino)
    <div class="checkbox-inline">
        <label class="checkbox checkbox-lg checkbox-success">
            <input type="checkbox" name="Checkboxes5"/>
            <span></span>
            {{$termino?->titulo_condicion}}
        </label>
    </div>
    @endforeach
</div>