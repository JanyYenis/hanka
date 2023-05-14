<?php

namespace App\Http\Controllers\pais;

use App\Exceptions\ErrorException;
use App\Http\Controllers\Controller;
use App\Models\pais\Pais;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaisController extends Controller
{
    public function index(Request $request)
    {
        # code...
    }

    public function listado(Request $request)
    {
        $paises = Pais::with(
            'ciudades'
        )->orderBy('nombre', 'asc');

        return DataTables::eloquent($paises)
            ->addColumn("estado", function ($model) {
                $info['concepto'] = $model?->infoEstado;
                return view("sistema.estado", $info);
            })
            ->addColumn("nombre", function ($model) {
                $info['ruta'] = $model?->ruta ?? null;
                $info['nombre'] = $model?->nombre ?? null;
                return view("dashboard/sedes/paises/columnas/banderas", $info);
            })
            ->addColumn("action", "dashboard/sedes/paises/columnas/acciones")
            ->rawColumns(["action"])
            ->make(true);
    }

    public function store(Request $request)
    {
        $datos = $request->all();
        $pais = Pais::create($datos);
        if (!$pais) {
            throw new ErrorException("No se pudo crear la pais.");
        }

        return [
            "estado"  => "success",
            "mensaje" => "Se creo el registro correctamente."
        ];
    }

    public function editar(/*Pais*/ $pais)
    {
        $pais = Pais::find($pais);
        $info["pais"] = $pais;

        $respuesta["estado"] = "success";
        $respuesta["mensaje"] = "Datos cargados correctamente";
        $respuesta['html'] = view("dashboard.sedes.paises.editar", $info)->render();
    
        return response()->json($respuesta);
    }

    public function update(Request $request, /*Pais*/ $pais)
    {
        $datos = $request->all();
        $pais = Pais::find($pais);
        $actualizo = $pais->update($datos);
        if (!$actualizo) {
            throw new ErrorException("No se ha actualizado la información.");
        }

        return [
            "estado" => "success",
            "mensaje" => "Se ha actualizado la información correctamente."
        ];
    }

    public function verCiudades(/*Pais*/ $pais)
        {
            $pais = Pais::with('ciudades')->find($pais);
            $info["pais"] = $pais;
    
            $respuesta["estado"] = "success";
            $respuesta["mensaje"] = "Datos cargados correctamente";
            $respuesta['html'] = view("dashboard.sedes.ciudades.listado", $info)->render();
        
            return response()->json($respuesta);
        }
}
