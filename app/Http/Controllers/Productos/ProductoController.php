<?php

namespace App\Http\Controllers\Productos;

use App\Exceptions\ErrorException;
use App\Http\Controllers\Controller;
use App\Models\Producto\ImagenProducto;
use App\Models\Producto\Producto;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.productos.index');
    }

    public function listado(Request $request)
    {
        $prosuctos = Producto::with(
            'infoEstado',
            'marca',
            'subcategoria',
            'imagenPrincipal'
        );

        return DataTables::eloquent($prosuctos)
            ->addColumn("estado", function ($model) {
                $info['concepto'] = $model?->infoEstado;
                return view("sistema.estado", $info);
            })
            ->addColumn("descripcion", function ($model) {
                return $model?->descripcion ? strip_tags($model?->descripcion) : 'N/A';
            })
            ->addColumn("imagen", function ($model) {
                $info['ruta'] = $model?->imagenPrincipal?->ruta_imagen;
                return view("dashboard.productos.columnas.img", $info);
            })
            ->addColumn("action", "dashboard/productos/columnas/acciones")
            ->rawColumns(["action", "estado"])
            ->make(true);
    }

    public function store(Request $request)
    {
        $datos = $request->all();
        
        $producto = Producto::create($datos);
        if (!$producto) {
            throw new ErrorException("No se pudo crear la producto.");
        }

        if ($request->file('file')) {
            $path = public_path().'/img/productos/';
            $file = $request->file('file');
            $fileName = $file?->getClientOriginalName();
            $file->move($path, $fileName);
            
            $info['imagen_ruta'] = '/img/productos/'.$fileName;
            $info['id_producto'] = $producto?->id;
            $info['principal']   = ImagenProducto::PRINCIPAL;
            
            $imagen = ImagenProducto::create($info);
            if (!$imagen) {
                throw new ErrorException("No se pudo agregar la imagen.");
            }
        }

        return [
            "estado"  => "success",
            "mensaje" => "Se creo el registro correctamente."
        ];
    }

    public function editar(/*Producto*/ $producto)
    {
        $producto = Producto::with(
            'marca',
            'subcategoria.categoria'
            )->find($producto);
        $info["producto"] = $producto;

        $respuesta["estado"] = "success";
        $respuesta["mensaje"] = "Datos cargados correctamente";
        $respuesta['html'] = view("dashboard.productos.editar", $info)->render();
    
        return response()->json($respuesta);
    }

    public function update(Request $request, /*Producto*/ $producto)
    {
        $datos = $request->all();
        dd($datos);
        $producto = Producto::find($producto);
        $actualizar = $producto->update($datos);
        if (!$actualizar) {
            throw new ErrorException("No se ha actualizado la información.");
        }

        if ($request->file('imagen_ruta')) {
            dd('jany');
            $path = public_path().'/img/productos/';
            $file = $request->file('file');
            $fileName = $file?->getClientOriginalName();
            $file->move($path, $fileName);
            
            $info['imagen_ruta'] = '/img/productos/'.$fileName;
            $info['id_producto'] = $producto?->id;
            $info['principal']   = ImagenProducto::PRINCIPAL;
            
            $imagen = ImagenProducto::create($info);
            if (!$imagen) {
                throw new ErrorException("No se pudo agregar la imagen.");
            }
        }

        return [
            "estado" => "success",
            "mensaje" => "Se ha actualizado la información correctamente."
        ];
    }
}
