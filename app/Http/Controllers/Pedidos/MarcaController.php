<?php

namespace App\Http\Controllers\Productos;

use App\Exceptions\ErrorException;
use App\Http\Controllers\Controller;
use App\Models\Marca\Marca;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MarcaController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.productos.marcas.index');
    }

    public function listado(Request $request)
    {
        $marcas = Marca::with(
            'infoEstado',
        );

        return DataTables::eloquent($marcas)
            ->addColumn("estado", function ($model) {
                $info['concepto'] = $model?->infoEstado;
                return view("sistema.estado", $info);
            })
            ->addColumn("descripcion", function ($model) {
                return $model?->descripcion ? strip_tags($model?->descripcion) : 'N/A';
            })
            ->addColumn("action", "dashboard/productos/marcas/columnas/acciones")
            ->rawColumns(["action", "estado"])
            ->make(true);
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $marca = Marca::create($datos);
        if (!$marca) {
            throw new ErrorException("No se pudo crear la marca.");
        }

        return [
            "estado"  => "success",
            "mensaje" => "Se creo el registro correctamente."
        ];
    }

    public function editar(/*Marca*/ $marca)
    {
        $marca = Marca::with(
            'infoEstado',
            )->find($marca);
        $info["marca"] = $marca;

        $respuesta["estado"] = "success";
        $respuesta["mensaje"] = "Datos cargados correctamente";
        $respuesta['html'] = view("dashboard.productos.marcas.editar", $info)->render();
    
        return response()->json($respuesta);
    }

    public function update(Request $request, /*Marca*/ $marca)
    {
        $datos = $request->all();
        $marca = Marca::find($marca);
        $actualizo = $marca->update($datos);
        if (!$actualizo) {
            throw new ErrorException("No se ha actualizado la información.");
        }

        return [
            "estado" => "success",
            "mensaje" => "Se ha actualizado la información correctamente."
        ];
    }

    public function buscarMarcas(Request $request)
    {
        $nombre = $request->get("busqueda");
        $filtro = "%$nombre%";
        $marcas = Marca::select("id", "nombre as text")
            ->where("estado", Marca::ACTIVO)
            ->whereRaw("LOWER(nombre) LIKE LOWER(?)", $filtro)
            ->get();
        return response()->json($marcas);
    }
}
