<?php

namespace App\Http\Controllers\Productos;

use App\Exceptions\ErrorException;
use App\Http\Controllers\Controller;
use App\Models\Subcategoria\Subcategoria;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubcategoriaController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.productos.subcategorias.index');
    }

    public function listado(Request $request)
    {
        $subcategorias = Subcategoria::with(
            'infoEstado',
            'categoria'
        );

        return DataTables::eloquent($subcategorias)
            ->addColumn("estado", function ($model) {
                $info['concepto'] = $model?->infoEstado;
                return view("sistema.estado", $info);
            })
            ->addColumn("descripcion", function ($model) {
                return $model?->descripcion ? strip_tags($model?->descripcion) : 'N/A';
            })
            ->addColumn("action", "dashboard/productos/subcategorias/columnas/acciones")
            ->rawColumns(["action", "estado"])
            ->make(true);
    }

    public function store(Request $request)
    {
        $datos = $request->all();
            
        $categoria = Subcategoria::create($datos);
        if (!$categoria) {
            throw new ErrorException("No se pudo crear la subcategoria.");
        }

        $response = [
            "estado"  => "success",
            "mensaje" => "Se creo el registro correctamente."
        ];

        return response()->json($response);
    }

    public function editar(/*Subcategoria*/ $subcategoria)
    {
        $subcategoria = Subcategoria::with(
            'infoEstado',
            'categoria'
            )->find($subcategoria);
        $info["subcategoria"] = $subcategoria;

        $respuesta["estado"] = "success";
        $respuesta["mensaje"] = "Datos cargados correctamente";
        $respuesta['html'] = view("dashboard.productos.subcategorias.editar", $info)->render();
    
        return response()->json($respuesta);
    }

    public function update(Request $request, /*Subcategoria*/ $subcategoria)
    {
        $datos = $request->all();

        $subcategoria = Subcategoria::find($subcategoria);
        $actualizar = $subcategoria->update($datos);
        if (!$actualizar) {
            throw new ErrorException("No se ha actualizado la información.");
        }

        return [
            "estado" => "success",
            "mensaje" => "Se ha actualizado la información correctamente."
        ];
    }

    public function buscarSubcategorias(Request $request)
    {
        $idCategoria = $request->input('id');
        $subcategorias = Subcategoria::select("id", "nombre as text")
            ->where('id_categoria', $idCategoria)
            ->get();
        
        return [
            "estado" => "success",
            "subcategorias" => $subcategorias,
            "mensaje" => "Se han cargado las subcategorias correctamente"
        ];
    }
}
