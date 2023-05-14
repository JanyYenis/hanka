@php
    $total = $subtotal;
    $subtotal = $subtotal;
    $valorPuntos = $usuario?->puntos * 250;
    $total = $total -$valorPuntos
@endphp
<!--begin::Section-->
<h4 class="mb-10 font-weight-bold text-dark">Hanka S.A | Prefactura</h4>
<h6 class="font-weight-bolder mb-3">Detalles del pedido</h6>
<div class="text-dark-50 line-height-lg">
    <div><b>Usuario: </b> {{$usuario?->nombre.' '.$usuario?->apellido}}</div>
    <div><b>Telefono usuario: </b> {{$telefono?->numero}}</div>
    <div><b>Tipo de pago: </b> <span id="facturaTipoPago"></span></div>
    <div><b>Empleado: </b> </div>
    <div><b>Sede: </b> {{$sede?->nombre}}</div>
    <div><b>Direccion de entrega: </b> <span id="facturaDireccion"></span></div>
    <div><b>Fecha Pedido: </b> {{date('Y-m-d')}}</div>
    <div><b>Puntos por la compra: </b> {{$puntos}}</div>
</div>
<div class="separator separator-dashed my-5"></div>
<!--end::Section-->
<!--begin::Section-->
<h6 class="font-weight-bolder mb-3">Pedido(s)</h6>
<div class="text-dark-50 line-height-lg">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="pl-0 font-weight-bold text-muted text-uppercase">Productos</th>
                    <th class="text-right font-weight-bold text-muted text-uppercase">Cantidad</th>
                    <th class="text-right font-weight-bold text-muted text-uppercase">IVA</th>
                    <th class="text-right font-weight-bold text-muted text-uppercase">Descuento</th>
                    <th class="text-right font-weight-bold text-muted text-uppercase">Garantia</th>
                    <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Valor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carritos as $carrito)
                    @php
                        $producto = $carrito?->producto ?? null;
                        $valor = $producto?->valoAPagar($carrito?->cantidad);
                    @endphp
                    <tr class="font-weight-boldest">
                        <td class="border-0 pl-0 pt-7 d-flex align-items-center">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
                            <div class="symbol-label" style="background-image: url({{asset($producto?->imagenPrincipal?->ruta_imagen ?? 'img/productos/por-defecto.png')}})"></div>
                        </div>
                        <!--end::Symbol-->
                        {{$producto?->nombre_producto}}</td>
                        <td class="text-right pt-7 align-middle">{{$carrito?->cantidad}}</td>
                        <td class="text-right pt-7 align-middle">{{$producto?->iva ? $producto?->iva.'%' : '0%'}}</td>
                        <td class="text-right pt-7 align-middle">{{$producto?->descuento ? number_format($producto?->descuento).'%' : '0%'}}</td>
                        <td class="text-right pt-7 align-middle">{{$producto?->garantia ? $producto?->garantia : 'N/A'}}</td>
                        <td class="text-primary pr-0 pt-7 text-right align-middle">{{"$".number_format($valor)}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4"></td>
                    <td class="font-weight-bolder text-right">Subtotal (Aplicado el descuento)</td>
                    <td class="font-weight-bolder text-right pr-0">{{"$".number_format($subtotal)}}</td>
                </tr>
                <tr id="seccionPuntosUsuario">
                    <td colspan="2" class="border-0 pt-0">Puntos del usuario</td>
                    <td colspan="2" class="border-0 pt-0">{{number_format($usuario?->puntos)}}</td>
                    <td class="border-0 pt-0 font-weight-bolder text-right">Valor en pesos</td>
                    <td class="border-0 pt-0 font-weight-bolder text-right pr-0">{{'$'.number_format($valorPuntos)}}</td>
                </tr>
                <tr>
                    <td colspan="4" class="border-0 pt-0"></td>
                    <td class="border-0 pt-0 font-weight-bolder font-size-h5 text-right">Total</td>
                    <td id="totalSinPuntos" class="border-0 pt-0 font-weight-bolder font-size-h5 text-success text-right pr-0">{{'$'.number_format($subtotal)}}</td>
                    <td id="totalConPuntos" class="border-0 pt-0 font-weight-bolder font-size-h5 text-success text-right pr-0 d-none">{{'$'.number_format($total)}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="separator separator-dashed my-5"></div>
<!--end::Section-->
<!--begin::Section-->
<h6 class="font-weight-bolder mb-3">Contactos</h6>
<div class="text-dark-50 line-height-lg">
    <div>{{$sede?->direccion}}</div>
    <div>{{$sede?->telefonoPrincipal?->numero}}</div>
    <div>{{$sede?->email}}</div>
</div>
<!--end::Section-->