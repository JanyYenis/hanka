<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" id="tabVerPrqs" href="#verPqrs" data-toggle="tab">Ver PQRS</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tabResponederPqrs" href="#responderPqrs" data-toggle="tab">Responder</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="verPqrs">
        <br>
        <div class="container">
            <label>{{$pqrs?->nombre ?? ''}}</label><br>
            <label>{{$pqrs?->infoDocumento?->nombre_corto ?? ''}}</label>
            <label>{{$pqrs?->documento ?? ''}}</label><br>
            <label>{{$pqrs?->infoTipo?->nombre ?? ''}}</label><br>
            <label>{{$pqrs?->email ?? ''}}</label><br>
            <label>{{$pqrs?->fecha_radicada->formatLo ?? ''}}</label><br>
            <textarea class="form-control summernote" name="descripcion" readonly>{!! html_entity_decode($pqrs?->descripcion , ENT_QUOTES, "UTF-8") !!}
            </textarea>
        </div>
    </div>
    <div class="tab-pane" id="responderPqrs">
        <br>
        <div id="errores">
            @component('sistema/div-errores')
            @endcomponent
            <br>
        </div>
        <div class="container">
            <input type="hidden" name="id_usuario_responde" value="1000">
            <input type="hidden" name="id" value="{{$pqrs?->id}}">
            <div>
                <label>Fecha:</label>
                <input type="datetime" name="fecha_respuesta" readonly="readonly"  class="form-control"  value="{{$pqrs?->fecha_respuesta ? $pqrs?->fecha_respuesta : date("Y-m-d")}}">
            </div>
            <div>
                <label>Enviar por:</label>
                <select name="medio_notificacion" class="form-control kt-selectpicker">
                    @foreach ($tiposNotificaciones as $tipo)
                        <option value="{{$tipo?->codigo}}" {{$pqrs?->medio_notificacion == $tipo?->codigo ? 'selected' : ''}}>{{$tipo?->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Respuesta</label>
                <textarea name="descripcion_respuesta" id="summernote" class="summernote">{!! html_entity_decode($pqrs?->descripcion_respuesta , ENT_QUOTES, "UTF-8") !!}</textarea>
            </div>
        </div>
    </div>
</div>