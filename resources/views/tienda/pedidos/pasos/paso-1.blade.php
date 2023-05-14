<div class="col-12">
    <h3>Detalles</h3>
</div><br>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Tipo de pago</label>
    <div class="col-lg-4">
        <div class="input-group flex-nowrap">
            <select name="tipo_pago" id="tipoPagoPedido" class="form-control kt-selectpicker">
                @foreach ($tipos as $tipo)
                    <option value="{{$tipo?->codigo}}">{{$tipo?->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <label class="col-3 col-form-label">Utilizar puntos</label>
    <div class="col-3">
        <span class="switch switch-lg switch-icon">
            <label>
                <input type="checkbox" id="usarPuntos" name="usar_puntos" value="1"/>
                <span></span>
            </label>
        </span>
    </div>
</div>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Direccion de envio</label>
    <div class="col-lg-10">
        <div class="input-group flex-nowrap">
            <input type="text" name="direccion" id="direccionPedido" class="form-control" value="{{$usuario?->direccion}}" required>
        </div>
    </div>
</div>
<div class="separator separator-dashed my-5"></div>
<div class="col-12">
    <h3>Contacto</h3>
</div><br>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">E-mail</label>
    <div class="col-lg-4">
        <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="flaticon-email"></i>
                </span>
            </div>
            <input type="email" name="email" class="form-control email" value="{{$usuario?->email}}" disabled required>
        </div>
    </div>
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Telefono</label>
    <div class="col-lg-4">
        <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-phone-alt"></i>
                </span>
            </div>
            <input type="tel" name="numero" id="tel" class="form-control tel" value="{{$telefono?->numero}}" disabled required>
        </div>
    </div>
</div>
<div class="separator separator-dashed my-5"></div>
<div class="col-12">
    <h3>Datos adicionales</h3>
</div><br>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Sede</label>
    <div class="col-lg-4">
        <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="flaticon-home-2"></i>
                </span>
            </div>
            <input type="text" class="form-control" value="{{$sede?->nombre}}" disabled required>
            <input type="hidden" name="id_sede" class="form-control" value="{{$sede?->id}}" required>
        </div>
    </div>
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Empleado</label>
    <div class="col-lg-4">
        <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="flaticon-profile-1"></i>
                </span>
            </div>
            <input type="text" class="form-control" value="jany" disabled required>
            <input type="hidden" name="id_empleado" class="form-control" value="1" required>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class=" col-lg-2 col-form-label text-sm-right requerido">Mis puntos</label>
    <div class="col-lg-4">
        <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="flaticon-piggy-bank"></i>
                </span>
            </div>
            <input type="text" class="form-control" value="{{number_format($usuario?->puntos)}}" disabled>
        </div>
    </div>
    {{-- <label class=" col-lg-2 col-form-label text-sm-right requerido">Empleado</label>
    <div class="col-lg-4">
        <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="flaticon-profile-1"></i>
                </span>
            </div>
            <input type="text" class="form-control" value="jany" disabled required>
            <input type="hidden" name="id_empleado" class="form-control" value="1" required>
        </div>
    </div> --}}
</div>
<input type="hidden" name="puntos_compra" value="{{$puntos}}">
<input type="hidden" name="total" value="{{$subtotal}}">
<input type="hidden" name="productos" value="{{$productos}}">
<input type="hidden" name="id_usuario" value="{{$usuario?->id}}">