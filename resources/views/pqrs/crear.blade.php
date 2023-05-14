@php
    $usuario = $usuario ?? null;
    $nombreCompleto = $usuario?->nombre." ".$usuario?->apellido ?? '';
    $tipos = $tipos ?? [];
@endphp
<div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">
    <input type="hidden" name="id_usuario_radica" value="{{$usuario?->id}}">
    <label>Fecha:</label>
    <input type="datetime" name="fecha_radicada" readonly="readonly"  class="form-control"  value="{{date("Y-m-d")}}">
    <br>
    <!-- Name -->
    <label>Nombre:</label>
    <input type="text" name="nombre"  class="form-control" {{$usuario?->nombre ? 'readonly="readonly"' : ''}} placeholder="Nombre" value="{{$nombreCompleto}}"/><br>
    <!-- Email -->
    <label>Email:</label>
    <input type="email" name="email"  class="form-control" {{$usuario?->email ? 'readonly="readonly"' : ''}} placeholder="Email" value="{{$usuario?->email ?? ''}}"/><br>
    <!-- T.D -->
    <label>Tipo de Documento:</label>
    <input  type="text" name="tipo_documento" class="form-control" {{$usuario?->tipo_documento ? 'readonly="readonly"' : ''}} placeholder="CC / CE / PA / LM" value="{{$usuario?->tipo_documento ?? ''}}"/><br>
    <!-- Documento -->
    <label>Numero Documento:</label>
    <input type="number" name="documento" class="form-control" {{$usuario?->documento ? 'readonly="readonly"' : ''}} placeholder="Documento" value="{{$usuario?->documento ?? ''}}"><br>
    
    <label>Tipo de Solicitud:</label>
    <select name="tipo_solicitud"  class="form-control kt-selectpicker" title="Seleccione el tipo">
        <option disabled selected>-Ninguna-</option>
        @foreach ($tipos as $tipo)
            <option value="{{$tipo?->codigo}}">{{$tipo?->nombre}}</option>
        @endforeach
    </select><br>

    <label>Descripción:</label>
    <div class="col-lg-12">
        <textarea name="descripcion" id="summernote" class="summernote" required></textarea>
    </div><br><br>
    {{-- <div class="form-group row">
        <label class="col-lg-3 col-form-label text-lg-right">Anexos</label>
        <div class="col-lg-9">
            <div class="dropzone dropzone-multi" id="kt_dropzone_4">
                <div class="dropzone-panel mb-lg-0 mb-2">
                    <a type="file" class="dropzone-select btn btn-light-primary font-weight-bold btn-sm dz-clickable">
                        Adjuntar archivos</a>
                    <a class="dropzone-upload btn btn-light-primary font-weight-bold btn-sm">Subir todo</a>
                    <a class="dropzone-remove-all btn btn-light-primary font-weight-bold btn-sm">Eliminar todo</a>
                </div>
                <div class="dropzone-items"></div>
            <div class="dz-default dz-message"><button class="dz-button" type="button">Arrastra los archivos aquí para subirlos</button></div></div>
            <span class="form-text text-muted">El tamaño máximo de archivo es de 1 MB y el número máximo de archivos es de 5.</span>
        </div>
    </div> --}}
</div>