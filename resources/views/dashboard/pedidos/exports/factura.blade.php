@php
    $pedido = $pedido ?? null;
    $detalles = $pedido?->detallesPedidos ?? null;
    $QrCode = $QrCode ?? false;
@endphp
<!doctype html>
<html lang="es">
<head>
    <title>{{"Factura_{$pedido?->indicador}"}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        .body-main {
            background: #ffffff;
            border-bottom: 15px solid #1E1F23;
            border-top: 15px solid #1E1F23;
            margin-top: 30px;
            margin-bottom: 30px;
            padding: 40px 30px !important;
            position: relative ;
            box-shadow: 0 1px 21px #808080;
            font-size:80%;
        }

        .main thead {
            background: #1E1F23;
            color: #fff;
        }

        .img{
            height: 100px;
        }
        
        h1{
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="page-header">
            <h1>Hanka</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 body-main">
                    <div class="col-md-12">
                       <div class="row">
                            <div class="col-md-4">
                                <img src="data:image/png;base64,{{ base64_encode(file_get_contents('https://cdn-icons-png.flaticon.com/512/107/107831.png')) }}" width="40" height="40">
                            </div>
                            <div class="col-md-8 text-right">
                                <h4><strong>Contactos</strong></h4>
                                <p>Calle 21 a 123 - 12<br>315-209-4191<br>hankavirtual@gmail.com</p>
                            </div>
                        </div><br/>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2>Factura</h2>
                                <h5>{{'#'.$pedido?->indicador}}</h5>
                            </div>
                        </div><br/>
                        <div class="row">
                            <p>
                                <b>Usuario:</b> {{$pedido?->usuario?->nombre." ".$pedido?->usuario?->apellido}}<br>
                                <b>Vendedor:</b> {{$pedido?->empleado?->usuario?->nombre." ".$pedido?->empleado?->usuario?->apellido}}<br>
                                <b>Sede:</b> {{$pedido?->sede?->nombre}}<br>
                            </p>
                        </div>
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><h5>Productos</h5></th>
                                        <th><h5>Cantidad</h5></th>
                                        <th><h5>IVA</h5></th>
                                        <th><h5>Valor</h5></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detalles as $detalle)
                                        @php
                                            $producto = $detalle?->producto ?? null;
                                        @endphp
                                        <tr>
                                            <td class="col-md-9">{{$producto?->nombre_producto}}</td>
                                            <td class="col-md-9">{{number_format($detalle?->cantidad)}}</td>
                                            <td class="col-md-9">{{$producto?->iva ? $producto?->iva."%" : '0%'}}</td>
                                            <td class="col-md-3">{{$detalle?->valor ? "$".number_format($detalle?->valor) : '$0'}}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3" class="text-right">
                                            <p><strong>Puntos:</strong></p>
                                        </td>
                                        <td>
                                            <p><strong>{{number_format($pedido?->puntos_compra)}}</strong></p>
                                        </td>
                                    </tr>
                                    <tr style="color: #05077e;">
                                        <td colspan="3" class="text-right"><h4><strong>Total:</strong></h4></td>
                                        <td class="text-left"><h4><strong>{{"$".number_format($pedido?->total)}}</strong></h4></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <p><b>Fecha Pedido:</b> {{$pedido?->fecha_pedido->formatLocalized('%e de %B de %Y')}}</p>
                            </div>
                            @if ($QrCode)
                                <div class="col-lg-2">
                                    <img src="data:image/svg+xml;base64,{{ base64_encode($QrCode) }}" alt="Escanear codigo Qr para ir a la pasarela de pago" align="right">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>