<?php

namespace App\Http\Controllers\pqrs;

use App\Exceptions\ErrorException;
use App\Http\Controllers\Controller;
use App\Models\pqrs\Pqrs;
use App\Models\usuario\Usuario;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PqrsController extends Controller
{
    public function index(Request $request)
    {
        return view('pqrs.index');
    }

    public function create(/*Usuario*/ $usuario)
    {
        $info["usuario"] = Usuario::find($usuario);
        $tipos = Pqrs::darTipos();
        $info["tipos"] = $tipos?->conceptosActivos;
        
        $respuesta["estado"] = "success";
        $respuesta["usuario"] = $usuario;
        $respuesta["mensaje"] = "Datos cargados correctamente";
        $respuesta['html'] = view("pqrs.crear", $info)->render();

        return response()->json($respuesta);
    }

    public function store(Request $request)
    {
        $datos = $request->all();
        $pqrs = Pqrs::create($datos);
        if (!$pqrs) {
            throw new ErrorException("No se pudo generar el PQRS.");
        }
        return [
            "estado" => "success",
            "mensaje" => "se ha registrado correctamente.",
        ];
    }

    public function listado(Request $request)
    {
        $pqrs = Pqrs::with(
            'usuario',
            'infoEstado',
            'infoDocumento',
            'infoTipo'
        );

        return DataTables::eloquent($pqrs)
            ->addColumn("id_usuario_radica", function ($model) {
                return $model?->usuario?->nombre." ".$model?->usuario?->apellido ?? "N/A";
            })
            ->addColumn("id_usuario_responde", function ($model) {
                $empleado = Usuario::find($model?->id_usuario_responde);
                return $empleado?->nombre." ".$empleado?->apellido ?? "N/A";
            })
            ->addColumn("tipo_documento", function ($model) {
                return $model?->infoDocumento?->nombre_corto ?? "N/A";
            })
            ->addColumn("tipo_solicitud", function ($model) {
                return $model?->infoTipo?->nombre ?? "N/A";
            })
            ->addColumn("estado", function ($model) {
                $info['concepto'] = $model?->infoEstado;
                return view("sistema.estado", $info);
            })
            ->addColumn("action", "pqrs/columnas/acciones")
            ->rawColumns(["action", "estado"])
            ->make(true);
    }

    public function ver(/*Pqrs*/ $pqrs)
    {
        $pqrs = Pqrs::with('infoTipo', 'infoDocumento', 'infoTipoNotificacion')->find($pqrs);
        
        if ($pqrs?->estado == Pqrs::ENVIADO) {
            $pqrs->update(['estado' => Pqrs::VISTO]);
        }
        
        $info["pqrs"] = $pqrs;
        $tiposNotificaciones = Pqrs::darTiposNotificaciones();
        $info["tiposNotificaciones"] = $tiposNotificaciones?->conceptosActivos;
        $respuesta["estado"] = "success";
        $respuesta["pqrs"] = $pqrs;
        $respuesta["mensaje"] = "Datos cargados correctamente";
        $respuesta['html'] = view("pqrs.ver", $info)->render();

        return response()->json($respuesta);
    }

    public function update(Request $request, /* Pqrs */ $pqrs)
    {
        $pqrs = Pqrs::find($pqrs);
        $datos = $request->all();
        $datos['estado'] = Pqrs::RESPONDIDO;
        $responder = $pqrs->update($datos);
        if (!$responder) {
            throw new ErrorException("No se ha actualizado la información.");
        }
        return [
            "estado" => "success",
            "mensaje" => "Se ha actualizado la información correctamente."
        ];
    }
    public function tabla(Request $request)
    {
        return view('pqrs.tabla');
    }
}
