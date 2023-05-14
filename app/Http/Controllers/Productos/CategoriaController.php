<?php

namespace App\Http\Controllers\Productos;

use App\Exceptions\ErrorException;
use App\Http\Controllers\Controller;
use App\Models\categoria\Categoria;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.productos.categorias.index');
    }

    public function listado(Request $request)
    {
        $categorias = Categoria::with(
            'infoEstado'
        );

        return DataTables::eloquent($categorias)
            ->addColumn("estado", function ($model) {
                $info['concepto'] = $model?->infoEstado;
                return view("sistema.estado", $info);
            })
            ->addColumn("banner", function ($model) {
                $info['ruta'] = $model?->banner;
                return view("dashboard.productos.categorias.columnas.img", $info);
            })
            ->addColumn("descripcion", function ($model) {
                return $model?->descripcion ? strip_tags($model?->descripcion) : 'N/A';
            })
            ->addColumn("action", "dashboard/productos/categorias/columnas/acciones")
            ->rawColumns(["action", "estado"])
            ->make(true);
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        if ($request->input('id')) {
            $this->update($request, $request->input('id'));
        } else {
            if ($request->file('file')) {
                $path = public_path().'/img/banners/';
                $file = $request->file('file');
                $fileName = $request->input('nombreArchivo') ? $request->input('nombreArchivo') : $file->getClientOriginalName();
                $file->move($path, $fileName);
                
                $datos['banner'] = '/img/banners/'.$fileName;
            }

            $categoria = Categoria::create($datos);
            if (!$categoria) {
                throw new ErrorException("No se pudo crear la categoria.");
            }
        }

        $response = [
            "estado"  => "success",
            "mensaje" => "Se creo el registro correctamente."
        ];

        return response()->json($response);
    }

    public function editar(/*Categoria*/ $categoria)
    {
        $categoria = Categoria::with(
            'infoEstado',
            )->find($categoria);
        $info["categoria"] = $categoria;

        $respuesta["estado"] = "success";
        $respuesta["mensaje"] = "Datos cargados correctamente";
        $respuesta['html'] = view("dashboard.productos.categorias.editar", $info)->render();
    
        return response()->json($respuesta);
    }

    public function update(Request $request, /*Categoria*/ $categoria)
    {
        $datos = $request->all();

        if ($request->file('file')) {
            $path = public_path().'/img/banners/';
            $file = $request->file('file');
            $fileName = $request->input('nombreArchivo') ? $request->input('nombreArchivo') : $file->getClientOriginalName();
            $file->move($path, $fileName);
            
            $datos['banner'] = '/img/banners/'.$fileName;
        }

        $categoria = Categoria::find($categoria);
        $actualizar = $categoria->update($datos);
        if (!$actualizar) {
            throw new ErrorException("No se ha actualizado la información.");
        }

        return [
            "estado" => "success",
            "mensaje" => "Se ha actualizado la información correctamente."
        ];
    }

    public function buscarCategorias(Request $request)
    {
        $nombre = $request->get("busqueda");
        $filtro = "%$nombre%";
        $categorias = Categoria::select("id", "nombre as text")
            ->where("estado", Categoria::ACTIVO)
            ->whereRaw("LOWER(nombre) LIKE LOWER(?)", $filtro)
            ->get();
        return response()->json($categorias);
    }
}
