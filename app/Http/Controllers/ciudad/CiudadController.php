<?php

namespace App\Http\Controllers\ciudad;

use App\Http\Controllers\Controller;
use App\Models\ciudad\Ciudad;
use App\Models\pais\Pais;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CiudadController extends Controller
{
    public function store(Request $request)
    {
        $datos = $request->all();
        $ciudad = Ciudad::create($datos);
        if (!$ciudad) {
            return [
                "estado"  => "error",
                "mensaje" => "No se pudo crear la ciudad."
            ];
        }

        return [
            "estado"  => "success",
            "mensaje" => "Se creo el registro correctamente."
        ];
    }

    public function buscarCiudades(Request $request)
    {
        $idPais = $request->input('id');
        $ciudades = Ciudad::select("id", "nombre as text")->where('id_pais', $idPais)->get();
        
        return [
            "estado" => "success",
            "ciudades" => $ciudades,
            "mensaje" => "Se han cargado las ciudades correctamente"
        ];
    }

    public function listado(Request $request)
    {
        $idPais = $request?->input('idPais') ?? null;

        $ciuades = Ciudad::with(
            'pais'
        )->orderBy('nombre', 'asc');

        if ($idPais) {
            $ciuades = $ciuades->where('id_pais', $idPais);
        }

        return DataTables::eloquent($ciuades)
            ->addColumn("estado", function ($model) {
                $info['concepto'] = $model?->infoEstado;
                return view("sistema.estado", $info);
            })
            ->addColumn("nombre", function ($model) {
                return $model?->nombre ?? 'N/A';
            })
            ->addColumn("action", "dashboard/sedes/ciudades/columnas/acciones")
            ->rawColumns(["action"])
            ->make(true);
    }

    public function create(/*Pais*/ $pais)
    {
        $pais = Pais::find($pais);
        $info["pais"] = $pais;

        $respuesta["estado"] = "success";
        $respuesta["mensaje"] = "Datos cargados correctamente";
        $respuesta['html'] = view("dashboard.sedes.ciudades.crear", $info)->render();
    
        return response()->json($respuesta);
    }

    public function editar(/*Ciudad*/ $ciudad)
    {
        $ciudad = Ciudad::find($ciudad);
        $info["ciudad"] = $ciudad;

        $respuesta["estado"] = "success";
        $respuesta["mensaje"] = "Datos cargados correctamente";
        $respuesta['html'] = view("dashboard.sedes.ciudades.crear", $info)->render();
    
        return response()->json($respuesta);
    }
    
    public function update(Request $request, /*Ciudad*/ $ciudad)
    {
        $datos = $request->all();
        $ciudad = Ciudad::find($ciudad);
        $actualizo = $ciudad->update($datos);
        if (!$actualizo) {
            return [
                "estado" => "error",
                "mensaje" => "No se ha actualizado la información."
            ];
        }

        return [
            "estado" => "success",
            "mensaje" => "Se ha actualizado la información correctamente."
        ];
    }
    
}
