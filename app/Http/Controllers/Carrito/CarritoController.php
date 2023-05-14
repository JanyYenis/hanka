<?php

namespace App\Http\Controllers\Carrito;

use App\Exceptions\ErrorException;
use App\Exceptions\InformationException;
use App\Http\Controllers\Controller;
use App\Models\Carrito\Carrito;
use App\Models\Producto\Producto;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CarritoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $usuario = auth()->user();
        $info['carritos'] = Carrito::with('usuario', 'producto.imagenPrincipal')
            ->where('id_usuario', $usuario?->id)
            ->where('estado', Carrito::ACTIVO)
            ->get();

        return view('tienda.carrito.index', $info);
    }

    public function store(Request $request, /* Producto */ $producto)
    {
        $usuario = auth()->user();
        $validar = Carrito::where([
            'estado'      => Carrito::ACTIVO,
            'id_usuario'  => $usuario?->id,
            'id_producto' => $producto
        ])->exists();
        if ($validar) {
            throw new ErrorException("Este producto ya se encuentra agregado en el carrito.");
        }

        $datos['id_producto'] = $producto;
        $datos['id_usuario'] = $usuario?->id;
        $carrito = Carrito::create($datos);
        if (!$carrito) {
            throw new ErrorException("No se pudo agregar al carrito.");
        }
        return [
            "estado" => "success",
            "mensaje" => "se ha registrado correctamente.",
        ];
    }

    public function update(Request $request, /* Pqrs */ $carrito)
    {
        $carrito = Carrito::find($carrito);
        $datos = $request->all();
        $responder = $carrito->update($datos);
        if (!$responder) {
            throw new ErrorException("No se ha actualizado la información.");
        }
        return [
            "estado" => "success",
            "mensaje" => "Se ha actualizado la información correctamente."
        ];
    }

    public function sumarCantidad(Request $request, /* Carrito */ $carrito)
    {
        $carrito = Carrito::with('producto')->find($carrito);
        $producto = $carrito?->producto;
        if ($producto?->cantidad > 0) {
            if (($carrito?->cantidad + 1) <= $producto?->cantidad) {
                $cantidad = $carrito?->cantidad + 1;
                $sumar = $carrito->update(['cantidad' => $cantidad]);
                if (!$sumar) {
                    throw new ErrorException("Error al intentar actualizar la cantidad.");
                }
            } else {
                throw new InformationException("La cantidad supera al total de ejemplares disponibles.");
            }
        } else {
            throw new InformationException("No se encuentran ejemplares de este producto.");
        }
        
        $usuario = auth()->user();

        $info['carritos'] = Carrito::with('producto')
            ->where('estado', Carrito::ACTIVO)
            ->where('id_usuario', $usuario?->id)
            ->get();
            
        return [
            'estado' => 'success',
            'html'   => view("tienda.carrito.listado", $info)->render()
        ];
    }

    public function restarCantidad(Request $request, /* Carrito */ $carrito)
    {
        $carrito = Carrito::with('producto')->find($carrito);
        $producto = $carrito?->producto;
        if ($producto?->cantidad > 0) {
            if (($carrito?->cantidad - 1) != 0) {
                $cantidad = $carrito?->cantidad - 1;
                $sumar = $carrito->update(['cantidad' => $cantidad]);
                if (!$sumar) {
                    throw new ErrorException("Error al intentar actualizar la cantidad.");
                }
            } else {
                throw new InformationException("La cantidad no puede ser menor a 1.");
            }
        } else {
            throw new InformationException("No se encuentran ejemplares de este producto.");
        }
        
        $usuario = auth()->user();
        $info['carritos'] = Carrito::with('producto')
            ->where('estado', Carrito::ACTIVO)
            ->where('id_usuario', $usuario?->id)
            ->get();

        return [
            'estado' => 'success',
            'html'   => view("tienda.carrito.listado", $info)->render()
        ];
    }
}
