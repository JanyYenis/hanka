<?php

namespace App\Http\Controllers\Empleados;

use App\Exceptions\ErrorException;
use App\Http\Controllers\Controller;
use App\Models\Empleado\Empleado;
use App\Models\usuario\Usuario;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmpleadoController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.empleados.index');
    }

    public function listado(Request $request)
    {
        $empleados = Empleado::with(
            'infoEstado',
            'cargo',
            'usuario.infoDocumento'
        );

        return DataTables::eloquent($empleados)
            ->addColumn("estado", function ($model) {
                $info['concepto'] = $model?->infoEstado;
                return view("sistema.estado", $info);
            })
            ->addColumn("id_usuario", function ($model) {
                return $model?->usuario?->nombre." ".$model?->usuario?->apellido ?? 'N/A';
            })
            ->addColumn("tipo", function ($model) {
                return $model?->usuario?->infoDocumento?->nombre_corto ?? 'N/A';
            })
            ->addColumn("documento", function ($model) {
                return $model?->usuario?->documento ?? 'N/A';
            })
            ->addColumn("id_cargo", function ($model) {
                return $model?->cargo?->nombre ?? 'N/A';
            })
            ->addColumn("telefono", function ($model) {
                // return $model?->telefono?->numero ?? 'N/A';
                return $model?->usuario?->telefono ?? 'N/A';
            })
            ->addColumn("email", function ($model) {
                return $model?->usuario?->email ?? 'N/A';
            })
            ->addColumn("action", "dashboard/empleados/columnas/acciones")
            ->rawColumns(["action", "estado"])
            ->make(true);
    }

    public function store(Request $request)
    {
        $datos = $request->all();
        $usuario = $request?->input('id_usuario');
        $validacion = Empleado::where('id_usuario', $usuario)->first();

        if ($validacion) {
            $this->update($request, $validacion?->id);
        } else {
            $empleado = Empleado::create($datos);
            if (!$empleado) {
                throw new ErrorException("No se pudo crear la empleado.");
            }
        }

        return [
            "estado"  => "success",
            "mensaje" => "Se creo el registro correctamente."
        ];
    }

    public function editar(/*Empleado*/ $empleado)
    {
        $empleado = Empleado::with(
            'cargo',
            'usuario'
            )->find($empleado);
        $info["empleado"] = $empleado;

        $respuesta["estado"] = "success";
        $respuesta["mensaje"] = "Datos cargados correctamente";
        $respuesta['html'] = view("dashboard.empleados.editar", $info)->render();
    
        return response()->json($respuesta);
    }

    public function update(Request $request, /*Empleado*/ $empleado)
    {
        $datos = $request->all();
        $empleado = Empleado::find($empleado);
        $actualizo = $empleado->update($datos);
        if (!$actualizo) {
            throw new ErrorException("No se ha actualizado la información.");
        }

        return [
            "estado" => "success",
            "mensaje" => "Se ha actualizado la información correctamente."
        ];
    }
}
