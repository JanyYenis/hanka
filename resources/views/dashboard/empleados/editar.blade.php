<input type="hidden" name="id" value="{{$empleado->id}}">
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right">Usuario</label>
    <div class="col-lg-9">
        <div class="input-group flex-nowrap">
            <select class="form-control selectUsuarios" disabled data-placeholder="Seleccione el usuario" name="id_usuario" required>
                <option value="{{$empleado?->usuario?->id}}" selected>{{$empleado?->usuario?->nombre.' '.$empleado?->usuario?->apellido}}</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right ">Cargos</label>
    <div class="col-lg-9">
        <div class="input-group flex-nowrap">
            <select class="form-control selectCargos" data-placeholder="Seleccione el cargo" name="id_cargo" required>
                @if ($empleado?->cargo)
                    <option value="{{$empleado?->cargo?->id}}" selected>{{$empleado?->cargo?->nombre}}</option>
                @endif
            </select>
        </div>
    </div>
</div>