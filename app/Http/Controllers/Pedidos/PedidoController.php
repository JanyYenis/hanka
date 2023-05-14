<?php

namespace App\Http\Controllers\Pedidos;

use App\Exceptions\ErrorException;
use App\Http\Controllers\Controller;
use App\Mail\Pedidos\EnviarFacturaMail;
use App\Models\Carrito\Carrito;
use App\Models\Pedido\DetallePedido;
use App\Models\Pedido\Pedido;
use App\Models\sede\Sede;
use App\Models\usuario\Usuario;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Yajra\DataTables\Facades\DataTables;

class PedidoController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.pedidos.index');
    }
    
    public function misPedidos(Request $request)
    {
        return view('tienda.pedidos.index');
    }

    public function listado(Request $request)
    {
        $usuario = $request->input('usuario') ?? null;

        $pedidos = Pedido::with(
            'sede',
            'usuario',
            'infoEstado',
            'infoTipoPago',
            'empleado.usuario'
        );

        if ($usuario) {
            $pedidos = $pedidos->where('id_usuario', auth()->user()->id)
                ->where('estado', '!=', Pedido::ELIMINADO);
        }

        return DataTables::eloquent($pedidos)
            ->addColumn("estado", function ($model) {
                $info['concepto'] = $model?->infoEstado;
                return view("sistema.estado", $info);
            })
            ->addColumn("action", function($model){
                $info['model'] = $model;
                $info['accionPagar'] = $model?->estado == Pedido::POR_PAGAR && $model?->tipo_pago == Pedido::PASARELA;
                return view("dashboard/pedidos/columnas/acciones", $info);
            })
            ->rawColumns(["action", "estado"])
            ->make(true);
    }

    public function store(Request $request)
    {
        $datos = $request->all();
        $datos['fecha_pedido'] = now();
        $usuario = Usuario::find($request->input('id_usuario'));
        if ($request->input('usar_puntos')) {
            $valorPuntos = $usuario?->puntos * 250;
            $datos['total'] = $request->input('total') - $valorPuntos;
        }

        $productos = $request->input('productos');
        $productos = json_decode($productos);
        
        $pedido = Pedido::create($datos);
        if (!$pedido) {
            throw new ErrorException("No se pudo realizar el pedido.");
        }

        $carritos = Carrito::with('producto')->whereIn('id', $productos)->get();
        foreach ($carritos as $carrito) {
            $producto = $carrito?->producto;
            $valor = $carrito?->cantidad * $producto?->precio_venta;
            $detalle = DetallePedido::create([
                'id_pedido'   => $pedido?->id,
                'id_producto' => $producto?->id,
                'cantidad'    => $carrito?->cantidad,
                'valor'       => $valor
            ]);
            if (!$detalle) {
                throw new ErrorException("No se pudo realizar el pedido.");
            }   
            $carrito->update(['estado' => Carrito::ELIMINADO]);
        }

        if ($pedido?->tipo_pago == Pedido::PASARELA) {
            $this->enviarFactura($usuario, $pedido);
        }

        $response = [
            "estado"  => "success",
            "mensaje" => "Se creo el registro correctamente."
        ];

        return response()->json($response);
    }

    public function editar(/*Pedido*/ $pedido)
    {
        //
    }

    public function update(Request $request, /*Categoria*/ $categoria)
    {
        //
    }

    public static function generarFactura(/* Pedido */ $pedido)
    {
        $info['pedido'] = $pedido;
        $info['QrCode'] = false;
        
        if ($pedido?->tipo_pago == Pedido::PASARELA) {
            $info['QrCode'] = QrCode::size(100)->generate('https://preview.keenthemes.com/metronic/demo1/index.html');
        }

        return PDF::loadView("dashboard/pedidos/exports/factura", $info);
            // ->setPaper('a4', 'landscape') # Voltear hoja
    }

    public function exportFactura(Request $request, /* Pedido */ $pedido)
    {
        $pedido = Pedido::with(
            'sede',
            'usuario',
            'infoTipoPago',
            'empleado.usuario',
            'detallesPedidos.producto',
        )->find($pedido);

        return self::generarFactura($pedido)
            // ->setPaper('a4', 'landscape') # Voltear hoja
            ->stream("Factura_{$pedido?->indicador}.pdf");
    }

    public function create(Request $request, $productos)
    {
        $carritos = explode(',', $productos);
        // $usuario = Usuario::with(
        //     'telefonoPrincipal',
        //     'carritosActivos.producto.imagenPrincipal'
        // )->find(1000);
        $usuario = auth()->user();
        $usuario->load(
            'telefonoPrincipal',
            'carritosActivos.producto.imagenPrincipal'
        );
        $telefono = $usuario?->telefonoPrincipal;
        $carritos = $usuario?->carritosActivos()->whereIn('id', $carritos)->get();
        $tiposPago = Pedido::darTipo();
        $sede = Sede::with('telefonoPrincipal')->firstWhere('principal', Sede::PRINCIPAL);

        $puntos = 0;
        $subtotal = 0;
        $productos = [];
        foreach ($carritos as $carrito) {
            $producto = $carrito?->producto;
            $cancularPuntos = $carrito?->cantidad * $producto?->precio_venta;
            $puntos = $puntos + ($cancularPuntos / 1000);
            $valor = $producto?->valoAPagar($carrito?->cantidad);
            $subtotal = $subtotal + $valor ?? 0;
            array_push($productos, $carrito?->id);
        }

        $info['usuario']   = $usuario;
        $info['telefono']  = $telefono;
        $info['carritos']  = $carritos;
        $info['sede']      = $sede;
        $info['puntos']    = $puntos;
        $info['subtotal']  = $subtotal;
        $info['productos'] = json_encode($productos);
        $info['tipos']     = $tiposPago->conceptosActivos()->where('codigo', '!=', Pedido::TARJETA)->get();

        return view('tienda.pedidos.crear', $info)->render();
    }

    public function enviarFactura($usuario, $pedido)
    {
        $pedido->load(
            'sede',
            'usuario',
            'infoTipoPago',
            'empleado.usuario',
            'detallesPedidos.producto'
        );

        $pdf = self::generarFactura($pedido)->output();

        Mail::to($usuario?->email)
            ->queue(new EnviarFacturaMail($usuario, $pedido, $pdf));
    }
}
