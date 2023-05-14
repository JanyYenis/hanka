<?php

namespace App\Http\Controllers\Comentarios;

use App\Exceptions\ErrorException;
use App\Http\Controllers\Controller;
use App\Models\Comentario\Comentario;
use App\Models\Producto\Producto;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ComentarioController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.comentarios.index');
    }

    public function listado(Request $request)
    {
        $comentarios = Comentario::with(
            'infoEstado',
            'producto',
            'usuario'
        );

        return DataTables::eloquent($comentarios)
            ->addColumn("estado", function ($model) {
                $info['concepto'] = $model?->infoEstado;
                return view("sistema.estado", $info);
            })
            ->addColumn("estrellas", function ($model) {
                $info['estrellas'] = $model?->estrellas;
                $info['faltantes'] = Comentario::MAXIMO_ESTRELLAS - $model?->estrellas;
                return view("dashboard/comentarios/columnas/estrellas", $info);
            })
            ->addColumn("comentario", function ($model) {
                return $model?->comentario ? strip_tags($model?->comentario) : 'N/A';
            })
            ->rawColumns(["estado"])
            ->make(true);
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $comentario = Comentario::create($datos);
        if (!$comentario) {
            throw new ErrorException("No se pudo crear el comentario.");
        }

        return [
            "estado"  => "success",
            "mensaje" => "Se creo el registro correctamente."
        ];
    }

    public function create(/*Producto*/ $producto)
    {
        $producto = Producto::find($producto);
        $info["producto"] = $producto;

        $respuesta["estado"] = "success";
        $respuesta["mensaje"] = "Datos cargados correctamente";
        $respuesta['html'] = view("dashboard.comentarios.crear", $info)->render();
    
        return response()->json($respuesta);
    }
}
