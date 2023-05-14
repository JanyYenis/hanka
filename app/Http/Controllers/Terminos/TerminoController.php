<?php

namespace App\Http\Controllers\Terminos;

use App\Exceptions\ErrorException;
use App\Http\Controllers\Controller;
use App\Models\Termino\TerminoCondicion;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TerminoController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.terminos.index');
    }

    public function listado(Request $request)
    {
        $terminos = TerminoCondicion::with(
            'infoEstado',
        );

        return DataTables::eloquent($terminos)
            ->addColumn("estado", function ($model) {
                $info['concepto'] = $model?->infoEstado;
                return view("sistema.estado", $info);
            })
            ->addColumn("texto_condicion", function ($model) {
                return $model?->texto_condicion ? strip_tags($model?->texto_condicion) : 'N/A';
            })
            ->addColumn("action", "dashboard/terminos/columnas/acciones")
            ->rawColumns(["action", "estado"])
            ->make(true);
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $termino = TerminoCondicion::create($datos);
        if (!$termino) {
            throw new ErrorException("No se pudo crear el termino o condicion.");
        }

        return [
            "estado"  => "success",
            "mensaje" => "Se creo el registro correctamente."
        ];
    }

    public function editar(/*TerminoCondicion*/ $termino)
    {
        $termino = TerminoCondicion::with(
            'infoEstado',
            )->find($termino);
        $info["termino"] = $termino;

        $respuesta["estado"] = "success";
        $respuesta["mensaje"] = "Datos cargados correctamente";
        $respuesta['html'] = view("dashboard.terminos.editar", $info)->render();
    
        return response()->json($respuesta);
    }

    public function update(Request $request, /*TerminoCondicion*/ $termino)
    {
        $datos = $request->all();
        $datos['principal'] = $request->input('principal') ?? TerminoCondicion::NO_PRINCIPAL;

        $termino = TerminoCondicion::find($termino);
        $actualizo = $termino->update($datos);
        if (!$actualizo) {
            throw new ErrorException("No se ha actualizado la información.");
        }

        return [
            "estado" => "success",
            "mensaje" => "Se ha actualizado la información correctamente."
        ];
    }

    public function ver(Request $request)
        {
            $terminos = TerminoCondicion::with(
                'infoEstado',
            )
            ->where([
                'principal' => TerminoCondicion::PRINCIPAL,
                'estado'    => TerminoCondicion::ACTIVO
            ])
            ->get();
            $info["terminos"] = $terminos;
    
            $respuesta["estado"] = "success";
            $respuesta["mensaje"] = "Datos cargados correctamente";
            $respuesta['html'] = view("dashboard.terminos.ver", $info)->render();
        
            return response()->json($respuesta);
        }
}
