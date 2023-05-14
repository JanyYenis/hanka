@php
    $total = 0;
@endphp
<div class="table-responsive">
    <table class="table" id="tablaCarrito">
        <thead>
            <tr>
                <th class="text-center">
                    <div class="checkbox-inline">
                        <label class="checkbox checkbox-success">
                            <input type="checkbox" name="productos" class="checkSeleccionarTodos"/>
                            <span></span>
                        </label>
                    </div>
                </th>
                <th>Productos</th>
                <th class="text-center">Cantidad</th>
                <th class="text-right">Valor</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carritos as $carrito)
                @php
                    $producto = $carrito?->producto ?? null;
                    $valor = $carrito?->cantidad * $producto?->precio_venta;
                    $total = $total + $valor ?? 0;
                @endphp
                <tr>
                    <td class="text-center align-middle">
                        <label class="checkbox checkbox-success checkComprar">
                            <input type="checkbox" name="producto" class="checkSeleccionado" data-pedido="{{$carrito?->id}}"/>
                            <span></span>
                        </label>
                    </td>
                    <td class="d-flex align-items-center font-weight-bolder">
                        <div class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                            <div class="symbol-label" style="background-image: url({{ asset($producto?->imagenPrincipal?->ruta_imagen ?? 'img/productos/por-defecto.png') }})"></div>
                        </div>
                        <a href="#" class="text-dark text-hover-primary">{{$producto?->nombre_producto}}</a>
                    </td>
                    <td class="text-center align-middle">
                        <a href="javascript:;" class="btn btn-xs btn-light-success btn-icon mr-2 btnRestarCantidad" data-carrito="{{$carrito?->id}}">
                            <i class="flaticon2-line"></i>
                        </a>
                        <span class="mr-2 font-weight-bolder">{{$carrito?->cantidad}}</span>
                        <a href="javascript:;" class="btn btn-xs btn-light-success btn-icon btnSumarCantidad" data-carrito="{{$carrito?->id}}">
                            <i class="flaticon2-plus"></i>
                        </a>
                    </td>
                    <td class="text-right align-middle font-weight-bolder font-size-h5">{{number_format($valor)}}</td>
                    <td class="text-right align-middle">
                        <a href="#" class="btn btn-danger font-weight-bolder font-size-sm">Eliminar</a>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2"></td>
                <td class="font-weight-bolder font-size-h4 text-right">Subtotal</td>
                <td class="font-weight-bolder font-size-h4 text-right total">{{number_format($total)}}</td>
            </tr>
        </tbody>
    </table>
</div>